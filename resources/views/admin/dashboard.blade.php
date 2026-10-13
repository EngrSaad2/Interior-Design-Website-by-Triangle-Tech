@extends('admin.layout')

@section('title', 'CMS Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Welcome Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200 shadow-xs">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight font-heading">
                Welcome back, {{ Auth::user()->name ?? 'Engr Saad' }}!
            </h1>
            <p class="text-xs text-slate-500 mt-1">
                Triangle Interior Design CMS &bull; Real-time stats and content management center.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.create') }}" class="px-4 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm flex items-center gap-2">
                <i class="fas fa-plus"></i> Add New Project
            </a>
            <a href="{{ route('home') }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all flex items-center gap-2">
                <i class="fas fa-external-link-alt text-slate-400"></i> Live Site
            </a>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Card 1: Customer Inquiries -->
        <a href="{{ route('admin.inquiries.index') }}" class="bg-white p-6 rounded-3xl border border-slate-200 hover:border-rose-300 transition-all shadow-xs group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Leads &amp; Inquiries</span>
                <div class="w-10 h-10 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-sm group-hover:scale-110 transition-transform">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-black text-slate-900">{{ $stats['inquiries'] }}</span>
                @if($stats['new_inquiries'] > 0)
                    <span class="text-xs font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full">
                        {{ $stats['new_inquiries'] }} new
                    </span>
                @endif
            </div>
            <span class="text-[11px] text-slate-400 mt-2 block">Direct leads &amp; consultations</span>
        </a>

        <!-- Card 2: Portfolio Projects -->
        <a href="{{ route('admin.projects.index') }}" class="bg-white p-6 rounded-3xl border border-slate-200 hover:border-rose-300 transition-all shadow-xs group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Portfolio Projects</span>
                <div class="w-10 h-10 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-sm group-hover:scale-110 transition-transform">
                    <i class="fas fa-building"></i>
                </div>
            </div>
            <span class="text-3xl font-black text-slate-900">{{ $stats['projects'] }}</span>
            <span class="text-[11px] text-slate-400 mt-2 block">Residential &amp; commercial</span>
        </a>

        <!-- Card 3: Design Services -->
        <a href="{{ route('admin.services.index') }}" class="bg-white p-6 rounded-3xl border border-slate-200 hover:border-rose-300 transition-all shadow-xs group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Services</span>
                <div class="w-10 h-10 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm group-hover:scale-110 transition-transform">
                    <i class="fas fa-layer-group"></i>
                </div>
            </div>
            <span class="text-3xl font-black text-slate-900">{{ $stats['services'] }}</span>
            <span class="text-[11px] text-slate-400 mt-2 block">Active offerings</span>
        </a>

        <!-- Card 4: Custom Furniture -->
        <a href="{{ route('admin.products.index') }}" class="bg-white p-6 rounded-3xl border border-slate-200 hover:border-rose-300 transition-all shadow-xs group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Custom Furniture</span>
                <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm group-hover:scale-110 transition-transform">
                    <i class="fas fa-couch"></i>
                </div>
            </div>
            <span class="text-3xl font-black text-slate-900">{{ $stats['products'] }}</span>
            <span class="text-[11px] text-slate-400 mt-2 block">Factory shop items</span>
        </a>
    </div>

    <!-- Secondary Stats Pills -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <a href="{{ route('admin.sliders.index') }}" class="bg-white p-4 rounded-2xl border border-slate-200 flex items-center gap-3 hover:bg-slate-50 transition-colors">
            <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center text-xs">
                <i class="fas fa-images"></i>
            </div>
            <div>
                <span class="text-xs font-bold text-slate-800 block">{{ $stats['sliders'] }} Hero Slides</span>
                <span class="text-[10px] text-slate-400">Homepage carousel</span>
            </div>
        </a>

        <a href="{{ route('admin.blogs.index') }}" class="bg-white p-4 rounded-2xl border border-slate-200 flex items-center gap-3 hover:bg-slate-50 transition-colors">
            <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center text-xs">
                <i class="fas fa-newspaper"></i>
            </div>
            <div>
                <span class="text-xs font-bold text-slate-800 block">{{ $stats['blogs'] }} Articles</span>
                <span class="text-[10px] text-slate-400">Design blog CMS</span>
            </div>
        </a>

        <a href="{{ route('admin.testimonials.index') }}" class="bg-white p-4 rounded-2xl border border-slate-200 flex items-center gap-3 hover:bg-slate-50 transition-colors">
            <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center text-xs">
                <i class="fas fa-star"></i>
            </div>
            <div>
                <span class="text-xs font-bold text-slate-800 block">{{ $stats['testimonials'] }} Client Reviews</span>
                <span class="text-[10px] text-slate-400">Trust feedback</span>
            </div>
        </a>

        <a href="{{ route('admin.faqs.index') }}" class="bg-white p-4 rounded-2xl border border-slate-200 flex items-center gap-3 hover:bg-slate-50 transition-colors">
            <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center text-xs">
                <i class="fas fa-question-circle"></i>
            </div>
            <div>
                <span class="text-xs font-bold text-slate-800 block">{{ $stats['faqs'] }} FAQs</span>
                <span class="text-[10px] text-slate-400">Accordion answers</span>
            </div>
        </a>
    </div>

    <!-- Recent Inquiries & Projects Split Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left: Recent Inquiries (2 Cols) -->
        <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-900 font-heading">Recent Customer Inquiries</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Direct leads from consultation modal &amp; contact form</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-bold text-rose-600 hover:text-rose-500">
                    View All &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-semibold border-b border-slate-100">
                        <tr>
                            <th class="p-4">Customer</th>
                            <th class="p-4">Phone</th>
                            <th class="p-4">Service</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentInquiries as $inquiry)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="p-4 font-bold text-slate-800">
                                    {{ $inquiry->name }}
                                    @if($inquiry->email)
                                        <span class="block font-normal text-[11px] text-slate-400">{{ $inquiry->email }}</span>
                                    @endif
                                </td>
                                <td class="p-4 font-mono text-slate-600">
                                    <a href="tel:{{ $inquiry->phone }}" class="hover:text-rose-600">
                                        {{ $inquiry->phone }}
                                    </a>
                                </td>
                                <td class="p-4 text-slate-600">
                                    {{ $inquiry->service_type ?? 'General' }}
                                    @if($inquiry->budget)
                                        <span class="block text-[11px] text-slate-400">Budget: {{ $inquiry->budget }}</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    @if($inquiry->status === 'new')
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-600 border border-rose-200">New</span>
                                    @elseif($inquiry->status === 'contacted')
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Contacted</span>
                                    @elseif($inquiry->status === 'completed')
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Completed</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600">Read</span>
                                    @endif
                                </td>
                                <td class="p-4 text-right">
                                    <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="p-2 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-600 transition-colors inline-block" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-slate-400">
                                    No customer inquiries yet. Leads will appear here automatically.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Recent Projects & Quick Shortcuts (1 Col) -->
        <div class="space-y-6">
            <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-bold text-slate-900 font-heading">Recent Projects</h2>
                    <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-rose-600 hover:text-rose-500">All &rarr;</a>
                </div>
                <div class="space-y-3">
                    @forelse($recentProjects as $proj)
                        <div class="flex items-center justify-between gap-3 p-2.5 rounded-2xl hover:bg-slate-50 transition-colors">
                            <div class="flex items-center gap-3 min-w-0">
                                <img src="{{ asset($proj->featured_image ?? 'images/banner-1.webp') }}" class="w-10 h-10 rounded-xl object-cover shrink-0" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                                <div class="truncate">
                                    <span class="text-xs font-bold text-slate-800 block truncate">{{ $proj->title }}</span>
                                    <span class="text-[10px] text-slate-400 block truncate">{{ $proj->location ?? 'Dhaka, Bangladesh' }}</span>
                                </div>
                            </div>
                            <a href="{{ route('admin.projects.edit', $proj->id) }}" class="text-xs text-slate-400 hover:text-rose-600 shrink-0 p-1">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400">No projects added yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Quick Action Shortcuts -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-xs p-6">
                <h2 class="text-base font-bold text-slate-900 font-heading mb-4">Quick Management</h2>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('admin.services.create') }}" class="p-3 rounded-2xl bg-slate-50 hover:bg-rose-50 hover:text-rose-700 text-slate-700 text-xs font-bold flex flex-col items-center gap-1.5 transition-colors text-center">
                        <i class="fas fa-layer-group text-sm"></i>
                        <span>New Service</span>
                    </a>
                    <a href="{{ route('admin.products.create') }}" class="p-3 rounded-2xl bg-slate-50 hover:bg-rose-50 hover:text-rose-700 text-slate-700 text-xs font-bold flex flex-col items-center gap-1.5 transition-colors text-center">
                        <i class="fas fa-couch text-sm"></i>
                        <span>New Furniture</span>
                    </a>
                    <a href="{{ route('admin.blogs.create') }}" class="p-3 rounded-2xl bg-slate-50 hover:bg-rose-50 hover:text-rose-700 text-slate-700 text-xs font-bold flex flex-col items-center gap-1.5 transition-colors text-center">
                        <i class="fas fa-newspaper text-sm"></i>
                        <span>New Blog</span>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="p-3 rounded-2xl bg-slate-50 hover:bg-rose-50 hover:text-rose-700 text-slate-700 text-xs font-bold flex flex-col items-center gap-1.5 transition-colors text-center">
                        <i class="fas fa-cog text-sm"></i>
                        <span>Site Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
