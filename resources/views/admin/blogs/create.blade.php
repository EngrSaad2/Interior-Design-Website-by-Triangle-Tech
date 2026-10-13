@extends('admin.layout')

@section('title', 'Write Blog Article')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Write Blog Article</h1>
            <p class="text-xs text-slate-500 mt-1">Publish insightful interior design guides &amp; expert tips.</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Blogs
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Article Title *</label>
                    <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. 10 Mistakes to Avoid When Designing Modular Kitchens" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Custom Slug (Optional)</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" placeholder="e.g. modular-kitchen-mistakes-bangladesh" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Category</label>
                    <input type="text" name="category" value="{{ old('category', 'Kitchen Advice') }}" placeholder="e.g. Interior Design" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Author Name</label>
                    <input type="text" name="author" value="{{ old('author', 'Triangle Interior Studio Team') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Reading Time</label>
                    <input type="text" name="reading_time" value="{{ old('reading_time', '5 min read') }}" placeholder="e.g. 5 min read" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Excerpt (Short summary)</label>
                <textarea name="excerpt" rows="2" placeholder="Brief summary displayed on article cards..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('excerpt') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Article Full Content * (HTML / Markdown supported)</label>
                <textarea name="content" rows="12" required placeholder="Write the complete article content..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none font-sans">{{ old('content') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Cover Image (Recommended 1200x675)</label>
                    <input type="file" name="cover_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                </div>
                <div class="flex items-center gap-2 pt-6">
                    <input type="checkbox" name="published_at" id="publishedAt" value="1" checked class="rounded border-slate-300 text-rose-600 focus:ring-rose-500">
                    <label for="publishedAt" class="text-xs font-bold text-slate-700 cursor-pointer">Publish immediately</label>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.blogs.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">Publish Article</button>
            </div>
        </form>
    </div>
</div>
@endsection
