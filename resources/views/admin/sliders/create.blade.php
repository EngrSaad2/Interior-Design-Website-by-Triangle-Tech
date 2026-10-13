@extends('admin.layout')

@section('title', 'Add New Hero Slide')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Add Hero Slide</h1>
            <p class="text-xs text-slate-500 mt-1">Upload banner image and configure heading text for homepage hero.</p>
        </div>
        <a href="{{ route('admin.sliders.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Sliders
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Slide Title / Main Heading *</label>
                <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. WE BELIEVE QUALITY PRODUCES LUXURY" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Highlight Word (Optional, colored red)</label>
                <input type="text" name="highlight_word" value="{{ old('highlight_word') }}" placeholder="e.g. LUXURY" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Subtitle / Description</label>
                <textarea name="subtitle" rows="3" placeholder="Brief spatial design description..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('subtitle') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Button Text</label>
                    <input type="text" name="button_text" value="{{ old('button_text', 'Get Free Consultation') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Button Link / Modal Trigger</label>
                    <input type="text" name="button_url" value="{{ old('button_url', '#consultationModal') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Banner Image * (Recommended 1920x1080)</label>
                    <input type="file" name="image" required accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 1) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_active" id="isActive" value="1" checked class="rounded border-slate-300 text-rose-600 focus:ring-rose-500">
                <label for="isActive" class="text-xs font-bold text-slate-700 cursor-pointer">Active (Display on Homepage)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.sliders.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">Save Slide</button>
            </div>
        </form>
    </div>
</div>
@endsection
