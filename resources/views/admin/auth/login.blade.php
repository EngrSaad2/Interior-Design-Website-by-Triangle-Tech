<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Triangle Interior Design CMS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-heading { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4 selection:bg-rose-600 selection:text-white">
    <div class="max-w-md w-full bg-slate-800 border border-slate-700/80 rounded-3xl p-8 sm:p-10 shadow-2xl relative overflow-hidden">
        <!-- Accent glow circle -->
        <div class="absolute -top-20 -right-20 w-44 h-44 bg-rose-600/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8 relative z-10">
            <a href="{{ route('home') }}" class="inline-block mb-4">
                <img src="{{ asset('images/triangle-logo-white.svg') }}" alt="Triangle Interior Design" class="h-12 mx-auto object-contain">
            </a>
            <h1 class="text-xl font-black text-white uppercase tracking-tight font-heading">CMS Administration</h1>
            <p class="text-xs text-slate-400 mt-1">Sign in to manage hero sliders, projects, services, furniture &amp; client inquiries</p>
        </div>

        @if($errors->any())
            <div class="p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs font-semibold mb-6">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="p-3.5 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-semibold mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4 relative z-10">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Admin Email</label>
                <input type="email" name="email" required value="{{ old('email', 'saad@gmail.com') }}" placeholder="saad@gmail.com" autocomplete="email" class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border border-slate-700 text-white text-sm focus:border-rose-500 focus:outline-none transition-all">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" required placeholder="••••••••" autocomplete="current-password" class="w-full px-4 py-3 rounded-xl bg-slate-900/80 border border-slate-700 text-white text-sm focus:border-rose-500 focus:outline-none transition-all">
            </div>

            <div class="flex items-center justify-between text-xs text-slate-400">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" checked class="rounded border-slate-700 bg-slate-900 text-rose-600 focus:ring-rose-500">
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-lg shadow-rose-600/30 mt-4">
                Sign In To CMS
            </button>
        </form>

        <div class="mt-8 text-center pt-6 border-t border-slate-700/60 relative z-10">
            <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-400 hover:text-white transition-colors">&larr; Return To Main Website</a>
        </div>
    </div>
</body>
</html>
