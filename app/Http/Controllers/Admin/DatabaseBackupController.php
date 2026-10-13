<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DatabaseBackupController extends Controller
{
    private function backupPath(): string
    {
        return storage_path('app/backups/db_backup.sql');
    }

    public function index(): View
    {
        $backupPath = $this->backupPath();
        $backupExists = file_exists($backupPath);
        $backupSize = $backupExists ? $this->humanFileSize(filesize($backupPath)) : null;
        $backupDate = $backupExists ? date('d M Y, h:i A', filemtime($backupPath)) : null;

        $stats = [
            'services' => DB::table('services')->count(),
            'projects' => DB::table('projects')->count(),
            'products' => DB::table('products')->count(),
            'blogs' => DB::table('blog_posts')->count(),
            'inquiries' => DB::table('inquiries')->count(),
            'sliders' => DB::table('sliders')->count(),
            'testimonials' => DB::table('testimonials')->count(),
            'faqs' => DB::table('faqs')->count(),
            'settings' => DB::table('site_settings')->count(),
            'users' => DB::table('users')->count(),
        ];

        return view('admin.backup.index', compact(
            'backupExists',
            'backupSize',
            'backupDate',
            'stats'
        ));
    }

    public function backup(Request $request): RedirectResponse
    {
        $path = $this->backupPath();

        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        try {
            $handle = fopen($path, 'w');
            if (!$handle) {
                return back()->with('error', 'Backup failed: Unable to open backup file for writing.');
            }

            fwrite($handle, "-- Triangle Interior Design Database Backup\n");
            fwrite($handle, "-- Generated: " . date('Y-m-d H:i:s') . "\n\n");
            fwrite($handle, "SET FOREIGN_KEY_CHECKS=0;\n");
            fwrite($handle, "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';\n");
            fwrite($handle, "SET time_zone = '+00:00';\n\n");

            $tables = DB::select('SHOW TABLES');
            $dbName = config('database.connections.mysql.database');
            $keyName = 'Tables_in_' . $dbName;
            $tableCount = 0;

            foreach ($tables as $tableObj) {
                if (!isset($tableObj->$keyName)) {
                    $vars = get_object_vars($tableObj);
                    $tableName = reset($vars);
                } else {
                    $tableName = $tableObj->$keyName;
                }

                fwrite($handle, "DROP TABLE IF EXISTS `" . $tableName . "`;\n");

                $createTableResult = DB::select("SHOW CREATE TABLE `" . $tableName . "`");
                $createTableSql = $createTableResult[0]->{'Create Table'};
                fwrite($handle, $createTableSql . ";\n\n");

                $rows = DB::table($tableName)->cursor();
                $chunkSize = 300;
                $rowStrings = [];

                foreach ($rows as $row) {
                    $values = [];
                    foreach ((array)$row as $val) {
                        if (is_null($val)) {
                            $values[] = "NULL";
                        } else {
                            $values[] = DB::getPdo()->quote($val);
                        }
                    }
                    $rowStrings[] = "(" . implode(', ', $values) . ")";

                    if (count($rowStrings) >= $chunkSize) {
                        $sql = "INSERT INTO `" . $tableName . "` VALUES \n" . implode(",\n", $rowStrings) . ";\n\n";
                        fwrite($handle, $sql);
                        $rowStrings = [];
                    }
                }

                if (count($rowStrings) > 0) {
                    $sql = "INSERT INTO `" . $tableName . "` VALUES \n" . implode(",\n", $rowStrings) . ";\n\n";
                    fwrite($handle, $sql);
                }

                $tableCount++;
            }

            fwrite($handle, "SET FOREIGN_KEY_CHECKS=1;\n");
            fclose($handle);

            if (!file_exists($path) || filesize($path) === 0) {
                return back()->with('error', 'Backup failed: Generated file is empty.');
            }

            $size = $this->humanFileSize(filesize($path));
            return back()->with('success', "Database backup created successfully! ({$tableCount} tables backed up, size: {$size}).");

        } catch (\Throwable $e) {
            if (isset($handle) && is_resource($handle)) {
                fclose($handle);
            }
            return back()->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }

    public function download(): BinaryFileResponse|RedirectResponse
    {
        $path = $this->backupPath();
        if (!file_exists($path)) {
            return back()->with('error', 'No backup file found. Create a backup first.');
        }

        $filename = 'interior_db_backup_' . date('Y-m-d_His') . '.sql';
        return response()->download($path, $filename, [
            'Content-Type' => 'application/sql',
        ]);
    }

    public function restore(Request $request): RedirectResponse
    {
        $path = $this->backupPath();
        if (!file_exists($path)) {
            return back()->with('error', 'No backup file found on server to restore from.');
        }

        return $this->executeSqlDump($path, 'Live database successfully restored from stored backup!');
    }

    public function upload(Request $request): RedirectResponse
    {
        $request->validate([
            'sql_file' => ['required', 'file', 'max:51200'],
        ]);

        $file = $request->file('sql_file');
        $ext = strtolower($file->getClientOriginalExtension());
        if ($ext !== 'sql') {
            return back()->with('error', 'Invalid file type. Please upload a valid .sql backup file.');
        }

        $tempPath = $file->getRealPath();
        return $this->executeSqlDump($tempPath, 'Database restored successfully from uploaded file!');
    }

    private function executeSqlDump(string $sqlFilePath, string $successMessage): RedirectResponse
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $pdo = DB::getPdo();
            $sqlContent = file_get_contents($sqlFilePath);

            $statements = array_filter(
                array_map('trim', explode(";\n", $sqlContent)),
                fn($s) => !empty($s) && !str_starts_with($s, '--')
            );

            foreach ($statements as $statement) {
                if (!empty($statement)) {
                    $pdo->exec($statement);
                }
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return back()->with('success', $successMessage);

        } catch (\Throwable $e) {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return back()->with('error', 'Restore failed: ' . $e->getMessage());
        }
    }

    private function humanFileSize(int $bytes): string
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }
        return $bytes . ' bytes';
    }
}
