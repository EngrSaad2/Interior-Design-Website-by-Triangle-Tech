<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageUploadService
{
    /**
     * Upload an uploaded file. If it's an image, convert to WebP.
     *
     * @param UploadedFile $file
     * @param string $prefix
     * @param int $quality (1-100)
     * @return string e.g. 'uploads/project_1712345678_abcdefgh.webp'
     */
    public static function uploadAsWebp(UploadedFile $file, string $prefix = '', int $quality = 85): string
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'bmp', 'gif'];

        $uniqueName = ($prefix ? $prefix . '_' : '') . time() . '_' . Str::random(8);
        $destinationDir = public_path('uploads');

        if (!file_exists($destinationDir)) {
            @mkdir($destinationDir, 0755, true);
        }

        // If not an image (e.g. pdf, video), move standard
        if (!in_array($extension, $imageExtensions) || !function_exists('imagewebp')) {
            $filename = $uniqueName . '.' . $extension;
            $file->move($destinationDir, $filename);
            return 'uploads/' . $filename;
        }

        $webpFilename = $uniqueName . '.webp';
        $webpPath = $destinationDir . DIRECTORY_SEPARATOR . $webpFilename;

        try {
            $content = file_get_contents($file->getRealPath());
            $image = @imagecreatefromstring($content);

            if ($image !== false) {
                if (function_exists('imagepalettetotruecolor')) {
                    @imagepalettetotruecolor($image);
                }
                @imagealphablending($image, true);
                @imagesavealpha($image, true);

                $converted = @imagewebp($image, $webpPath, $quality);
                @imagedestroy($image);

                if ($converted && file_exists($webpPath) && filesize($webpPath) > 0) {
                    return 'uploads/' . $webpFilename;
                }
            }
        } catch (\Throwable $e) {
            // Fallback to normal upload
        }

        $filename = $uniqueName . '.' . $extension;
        $file->move($destinationDir, $filename);
        return 'uploads/' . $filename;
    }
}
