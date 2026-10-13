@extends('admin.layout')

@section('title', 'Edit Service')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Edit Design Service</h1>
            <p class="text-xs text-slate-500 mt-1">Update service content, photo, and details.</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Services
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Service Title *</label>
                    <input type="text" name="title" required value="{{ old('title', $service->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $service->slug) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Short Excerpt *</label>
                <textarea name="excerpt" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('excerpt', $service->excerpt) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Detailed Description</label>
                <textarea name="description" rows="5" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('description', $service->description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Current Image</label>
                <img src="{{ asset($service->featured_image ?? 'images/banner-1.webp') }}" class="w-40 h-24 rounded-2xl object-cover border border-slate-200 mb-3" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Replace Image (Leave empty to keep current)</label>
                <input type="file" name="featured_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div class="flex items-center gap-2 pt-6">
                    <input type="checkbox" name="is_active" id="isActive" value="1" {{ $service->is_active ? 'checked' : '' }} class="rounded border-slate-300 text-rose-600 focus:ring-rose-500">
                    <label for="isActive" class="text-xs font-bold text-slate-700 cursor-pointer">Active (Display publicly on site)</label>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">Update Service</button>
            </div>
        </form>
    </div>
</div>
@endsection
