<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Triangle Interior Design CMS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-heading { font-family: 'Montserrat', sans-serif; }
        :root {
            --primary: #d32f2f;
        }
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1.5rem 0 0.5rem;
            width: 100%;
        }
        .custom-pagination {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            list-style: none;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
        }
        .custom-pagination .page-item { list-style: none; }
        .custom-pagination .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            padding: 0 0.75rem;
            border-radius: 8px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #334155;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .custom-pagination .page-link:hover {
            background: #d32f2f;
            border-color: #d32f2f;
            color: #ffffff;
        }
        .custom-pagination .page-item.active .page-link {
            background: #d32f2f;
            border-color: #d32f2f;
            color: #ffffff;
        }
        .custom-pagination .page-item.disabled .page-link {
            background: #f8fafc;
            border-color: #f1f5f9;
            color: #94a3b8;
            cursor: not-allowed;
            opacity: 0.6;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-100 text-slate-800 flex min-h-screen selection:bg-rose-600 selection:text-white">

    <!-- Mobile Backdrop -->
    <div id="adminSidebarBackdrop" class="fixed inset-0 bg-slate-950/60 backdrop-blur-xs z-40 hidden md:hidden transition-opacity duration-300 opacity-0"></div>

    <!-- Sidebar (Desktop static, Mobile offcanvas slide-over) -->
    <aside id="adminSidebar" class="fixed inset-y-0 left-0 z-50 w-72 md:w-64 bg-white border-r border-slate-200 flex flex-col shrink-0 shadow-2xl md:shadow-sm -translate-x-full md:translate-x-0 md:static transition-transform duration-300 ease-in-out">
        <div class="overflow-y-auto flex-1 pb-6">
            <!-- Brand Logo Header -->
            <div class="h-20 flex items-center justify-between px-5 border-b border-slate-100 bg-white">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/triangle-logo.svg') }}" alt="Triangle Interior Design" class="h-9 w-auto max-w-[150px] object-contain">
                    <span class="px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-wider bg-rose-50 text-rose-700 border border-rose-200 shrink-0">CMS</span>
                </a>
                <!-- Mobile Close Button -->
                <button type="button" id="adminSidebarClose" class="md:hidden p-2 rounded-xl text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors" aria-label="Close menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar Navigation Categories -->
            <div class="p-4 space-y-6">
                <!-- Group 1: Overview -->
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 px-3 block mb-2">Overview</span>
                    <div class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.dashboard*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="fas fa-chart-pie w-4"></i>
                            Dashboard
                        </a>
                    </div>
                </div>

                <!-- Group 2: Content & Media Management -->
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 px-3 block mb-2">Content &amp; Portfolio CMS</span>
                    <div class="space-y-1">
                        <a href="{{ route('admin.sliders.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.sliders*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="fas fa-images w-4"></i>
                            Hero Sliders
                        </a>

                        <a href="{{ route('admin.services.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.services*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-layer-group w-4"></i>
                                Design Services
                            </div>
                            <span class="px-1.5 py-0.5 rounded text-[10px] {{ request()->routeIs('admin.services*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }} font-bold">
                                {{ \App\Models\Service::count() }}
                            </span>
                        </a>

                        <a href="{{ route('admin.projects.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.projects*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-building w-4"></i>
                                Projects Portfolio
                            </div>
                            <span class="px-1.5 py-0.5 rounded text-[10px] {{ request()->routeIs('admin.projects*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }} font-bold">
                                {{ \App\Models\Project::count() }}
                            </span>
                        </a>

                        <a href="{{ route('admin.products.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.products*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-couch w-4"></i>
                                Custom Furniture
                            </div>
                            <span class="px-1.5 py-0.5 rounded text-[10px] {{ request()->routeIs('admin.products*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }} font-bold">
                                {{ \App\Models\Product::count() }}
                            </span>
                        </a>

                        <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.categories*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="fas fa-tags w-4"></i>
                            Categories
                        </a>

                        <a href="{{ route('admin.blogs.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.blogs*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-newspaper w-4"></i>
                                Blog Articles
                            </div>
                            <span class="px-1.5 py-0.5 rounded text-[10px] {{ request()->routeIs('admin.blogs*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }} font-bold">
                                {{ \App\Models\BlogPost::count() }}
                            </span>
                        </a>
                    </div>
                </div>

                <!-- Group 3: Trust & Reviews -->
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 px-3 block mb-2">Trust &amp; FAQs</span>
                    <div class="space-y-1">
                        <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.testimonials*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="fas fa-star w-4"></i>
                            Client Reviews
                        </a>

                        <a href="{{ route('admin.faqs.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.faqs*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="fas fa-question-circle w-4"></i>
                            FAQs
                        </a>
                    </div>
                </div>

                <!-- Group 4: Customer Inquiries & Leads -->
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 px-3 block mb-2">Leads &amp; Inquiries</span>
                    <div class="space-y-1">
                        <a href="{{ route('admin.inquiries.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.inquiries*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-envelope-open-text w-4"></i>
                                Customer Inquiries
                            </div>
                            @php
                                $newInquiriesCount = \App\Models\Inquiry::where('status', 'new')->count();
                            @endphp
                            @if($newInquiriesCount > 0)
                                <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-rose-500 text-white font-bold animate-pulse">
                                    {{ $newInquiriesCount }}
                                </span>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Group 5: Settings & Config -->
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 px-3 block mb-2">Configuration</span>
                    <div class="space-y-1">
                        <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.settings*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="fas fa-sliders w-4"></i>
                            Site Settings &amp; Branding
                        </a>

                        <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.profile*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="fas fa-shield-alt w-4"></i>
                            Security &amp; Password
                        </a>

                        <a href="{{ route('admin.backup.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.backup*') ? 'bg-rose-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="fas fa-database w-4"></i>
                            Database Backup
                        </a>
                    </div>
                </div>

                <!-- Group 6: Actions -->
                <div class="pt-2 border-t border-slate-100">
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 px-3 block mb-2">Actions</span>
                    <div class="space-y-1">
                        <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all text-slate-600 hover:bg-slate-100 hover:text-slate-900">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-external-link-alt text-slate-400"></i>
                                <span>View Live Site</span>
                            </div>
                        </a>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-rose-600 hover:bg-rose-50 transition-all text-left">
                                <i class="fas fa-sign-out-alt text-rose-500"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Panel Area -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-100">
        <!-- Top Header -->
        <header class="h-20 bg-white border-b border-slate-200 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-20 shadow-xs">
            <div class="flex items-center gap-3">
                <!-- Mobile Hamburger Menu Button -->
                <button type="button" id="adminSidebarToggle" class="md:hidden p-2 -ml-1 rounded-xl text-slate-700 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition-colors" aria-label="Open navigation menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Mobile Logo -->
                <a href="{{ route('admin.dashboard') }}" class="flex md:hidden items-center gap-2">
                    <img src="{{ asset('images/triangle-logo.svg') }}" alt="Triangle Interior Design" class="h-8 w-auto max-w-[130px] object-contain">
                    <span class="px-1.5 py-0.5 rounded text-[9px] font-black uppercase tracking-wider bg-rose-50 text-rose-700 border border-rose-200 shrink-0">CMS</span>
                </a>

                <span class="text-xs font-medium text-slate-500 hidden md:inline">
                    Triangle Interior CMS &bull; Laravel Dynamic Backend
                </span>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-50 border border-slate-200 text-xs text-slate-600 font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>System Online</span>
                </div>

                <a href="{{ route('admin.profile') }}" title="Manage Profile & Security Credentials" class="flex items-center gap-3 pl-3 border-l border-slate-200 hover:opacity-85 transition-opacity">
                    <div class="w-9 h-9 rounded-full bg-rose-600 text-white font-bold flex items-center justify-center text-sm shadow-sm">
                        {{ strtoupper(substr(Auth::user()->name ?? 'S', 0, 1)) }}
                    </div>
                    <div class="hidden sm:block text-left">
                        <span class="text-xs font-bold text-slate-800 block leading-tight">{{ Auth::user()->name ?? 'Engr Saad' }}</span>
                        <span class="text-[10px] text-slate-400 block">{{ Auth::user()->email ?? 'saad@gmail.com' }}</span>
                    </div>
                </a>
            </div>
        </header>

        <!-- Flash Notification Banners -->
        <div class="px-6 sm:px-8 pt-6 pb-0">
            @if(session('success'))
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold mb-4 flex items-center gap-2.5 shadow-2xs">
                    <i class="fas fa-check-circle text-emerald-600 shrink-0 text-sm"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold mb-4 flex items-center gap-2.5 shadow-2xs">
                    <i class="fas fa-exclamation-triangle text-rose-600 shrink-0 text-sm"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs mb-4 shadow-2xs">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Page Dynamic Content -->
        <main class="p-6 sm:p-8 flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('adminSidebarBackdrop');
            const openBtn = document.getElementById('adminSidebarToggle');
            const closeBtn = document.getElementById('adminSidebarClose');

            function openSidebar() {
                if (!sidebar || !backdrop) return;
                backdrop.classList.remove('hidden');
                requestAnimationFrame(() => {
                    backdrop.classList.remove('opacity-0');
                    backdrop.classList.add('opacity-100');
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                });
                document.body.classList.add('overflow-hidden');
            }

            function closeSidebar() {
                if (!sidebar || !backdrop) return;
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.remove('opacity-100');
                backdrop.classList.add('opacity-0');
                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
                document.body.classList.remove('overflow-hidden');
            }

            if (openBtn) openBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (backdrop) backdrop.addEventListener('click', closeSidebar);

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeSidebar();
            });

            if (sidebar) {
                sidebar.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        if (window.innerWidth < 768) closeSidebar();
                    });
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
