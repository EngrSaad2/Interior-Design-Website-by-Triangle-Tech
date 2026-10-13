@extends('admin.layout')

@section('title', 'Database Backup & Restore')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Database Backup &amp; Restore</h1>
            <p class="text-xs text-slate-500 mt-1">Export complete MySQL database snapshot, download SQL, or restore anytime.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Dashboard
        </a>
    </div>

    <!-- Live Database Records Overview -->
    <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-xs">
        <h2 class="text-xs font-black uppercase tracking-wider text-slate-400 mb-4">Live Database Records Overview</h2>
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 text-center">
            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-xl font-black text-slate-900 block">{{ $stats['projects'] }}</span>
                <span class="text-[10px] text-slate-500 font-bold uppercase">Projects</span>
            </div>
            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-xl font-black text-slate-900 block">{{ $stats['services'] }}</span>
                <span class="text-[10px] text-slate-500 font-bold uppercase">Services</span>
            </div>
            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-xl font-black text-slate-900 block">{{ $stats['products'] }}</span>
                <span class="text-[10px] text-slate-500 font-bold uppercase">Furniture</span>
            </div>
            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-xl font-black text-slate-900 block">{{ $stats['inquiries'] }}</span>
                <span class="text-[10px] text-slate-500 font-bold uppercase">Leads</span>
            </div>
            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-xl font-black text-slate-900 block">{{ $stats['sliders'] }}</span>
                <span class="text-[10px] text-slate-500 font-bold uppercase">Sliders</span>
            </div>
        </div>
    </div>

    <!-- Action Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card 1: Stored Server Backup -->
        <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs flex flex-col justify-between space-y-6">
            <div>
                <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-lg mb-4">
                    <i class="fas fa-database"></i>
                </div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Primary Stored Backup</h3>
                <p class="text-xs text-slate-500 mt-1">Single-click snapshot stored safely on the server filesystem.</p>

                <div class="mt-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 text-xs space-y-1">
                    @if($backupExists)
                        <div class="flex justify-between">
                            <span class="text-slate-400">File Size:</span>
                            <span class="font-bold text-slate-800">{{ $backupSize }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Created:</span>
                            <span class="font-bold text-slate-800">{{ $backupDate }}</span>
                        </div>
                    @else
                        <span class="text-slate-400 italic">No backup created yet.</span>
                    @endif
                </div>
            </div>

            <div class="space-y-2">
                <form action="{{ route('admin.backup.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-3 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-save"></i>
                        {{ $backupExists ? 'Overwrite / Create New Backup' : 'Create First Backup Now' }}
                    </button>
                </form>

                @if($backupExists)
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('admin.backup.download') }}" class="py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs text-center transition-all flex items-center justify-center gap-1.5">
                            <i class="fas fa-download"></i> Download SQL
                        </a>
                        <form action="{{ route('admin.backup.restore') }}" method="POST" onsubmit="return confirm('Restore database from stored backup? Current changes will be overwritten!');">
                            @csrf
                            <button type="submit" class="w-full py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all flex items-center justify-center gap-1.5">
                                <i class="fas fa-undo"></i> Restore Backup
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <!-- Card 2: Upload External .SQL Dump -->
        <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs flex flex-col justify-between space-y-6">
            <div>
                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg mb-4">
                    <i class="fas fa-file-import"></i>
                </div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Restore from Upload (.sql)</h3>
                <p class="text-xs text-slate-500 mt-1">Upload an external MySQL .sql file to immediately restore the database.</p>
            </div>

            <form action="{{ route('admin.backup.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4" onsubmit="return confirm('Upload and restore this database dump? Current data will be replaced!');">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Select .sql file (max 50MB)</label>
                    <input type="file" name="sql_file" required accept=".sql" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>

                <button type="submit" class="w-full py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm flex items-center justify-center gap-2">
                    <i class="fas fa-upload"></i> Upload &amp; Restore
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
