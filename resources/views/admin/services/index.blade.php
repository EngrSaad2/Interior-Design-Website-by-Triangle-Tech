@extends('admin.layout')

@section('title', 'Design Services')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Design Services CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Manage home interior services, photos, descriptions, and ordering.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="px-4 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New Service
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-semibold border-b border-slate-100">
                    <tr>
                        <th class="p-4">Image</th>
                        <th class="p-4">Title &amp; Slug</th>
                        <th class="p-4">Excerpt</th>
                        <th class="p-4">Order</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($services as $service)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="p-4">
                                <img src="{{ asset($service->featured_image ?? 'images/banner-1.webp') }}" class="w-16 h-12 rounded-xl object-cover border border-slate-200" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                            </td>
                            <td class="p-4 font-bold text-slate-800">
                                <div>{{ $service->title }}</div>
                                <span class="font-mono text-[10px] text-slate-400 font-normal">/services/{{ $service->slug }}</span>
                            </td>
                            <td class="p-4 text-slate-500 max-w-xs truncate">
                                {{ $service->excerpt ?? '—' }}
                            </td>
                            <td class="p-4 font-mono font-bold text-slate-600">
                                {{ $service->sort_order }}
                            </td>
                            <td class="p-4">
                                @if($service->is_active)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Active</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500">Hidden</span>
                                @endif
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('service.detail', $service->slug) }}" target="_blank" class="p-2 rounded-lg bg-slate-100 hover:bg-slate-200 transition-colors inline-block" title="View on site">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="p-2 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-600 transition-colors inline-block" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete service?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-600 transition-colors text-slate-500" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-slate-400">
                                No services found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
