@extends('admin.layout')

@section('title', 'Admin Profile & Security')

@section('content')
<div class="max-w-2xl mx-auto space-y-8">
    <div>
        <h1 class="text-xl font-black text-slate-900 font-heading">Security &amp; Profile Credentials</h1>
        <p class="text-xs text-slate-500 mt-1">Manage admin login email, display name &amp; password.</p>
    </div>

    <!-- Card 1: Update Name & Email -->
    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <h2 class="text-sm font-bold text-slate-900 font-heading mb-4 flex items-center gap-2">
            <i class="fas fa-user-shield text-rose-600"></i> Admin Login Credentials
        </h2>

        <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Admin Name</label>
                <input type="text" name="name" required value="{{ old('name', $user->name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Admin Login Email</label>
                <input type="email" name="email" required value="{{ old('email', $user->email) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                <span class="text-[11px] text-slate-400 mt-1 block">Default: saad@gmail.com</span>
            </div>

            <div class="pt-2 text-right">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs uppercase tracking-wider transition-all">
                    Update Account Email
                </button>
            </div>
        </form>
    </div>

    <!-- Card 2: Change Password -->
    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <h2 class="text-sm font-bold text-slate-900 font-heading mb-4 flex items-center gap-2">
            <i class="fas fa-lock text-rose-600"></i> Change Password
        </h2>

        <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Current Password *</label>
                <input type="password" name="current_password" required placeholder="••••••••" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">New Password *</label>
                    <input type="password" name="password" required placeholder="At least 6 characters" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Confirm New Password *</label>
                    <input type="password" name="password_confirmation" required placeholder="Repeat new password" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="pt-2 text-right">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">
                    Change Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
