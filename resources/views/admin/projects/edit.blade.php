@extends('admin.layout')

@section('title', 'Edit Project')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Edit Portfolio Project</h1>
            <p class="text-xs text-slate-500 mt-1">Update project specs, photos, location &amp; gallery.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Projects
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Project Title *</label>
                    <input type="text" name="title" required value="{{ old('title', $project->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $project->slug) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Category</label>
                    <input type="text" name="category" list="categoryList" value="{{ old('category', $project->category) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                    <datalist id="categoryList">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->name }}">
                        @endforeach
                    </datalist>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Location</label>
                    <input type="text" name="location" value="{{ old('location', $project->location) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Area (Sqft)</label>
                    <input type="text" name="area_sqft" value="{{ old('area_sqft', $project->area_sqft) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Completion Year</label>
                    <input type="text" name="completion_year" value="{{ old('completion_year', $project->completion_year) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Client Name</label>
                    <input type="text" name="client_name" value="{{ old('client_name', $project->client_name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Budget Range</label>
                    <input type="text" name="budget_range" value="{{ old('budget_range', $project->budget_range) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Project Story &amp; Spatial Details</label>
                <textarea name="description" rows="5" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('description', $project->description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Current Featured Image</label>
                <img src="{{ asset($project->featured_image ?? 'images/banner-1.webp') }}" class="w-40 h-24 rounded-2xl object-cover border border-slate-200 mb-3" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Replace Featured Image</label>
                <input type="file" name="featured_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Add More Gallery Photos</label>
                <input type="file" name="gallery[]" multiple accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                @if(is_array($project->gallery) && count($project->gallery) > 0)
                    <div class="mt-3 flex gap-2 flex-wrap">
                        @foreach($project->gallery as $img)
                            <img src="{{ asset($img) }}" class="w-16 h-16 rounded-xl object-cover border border-slate-200">
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_featured" id="isFeatured" value="1" {{ $project->is_featured ? 'checked' : '' }} class="rounded border-slate-300 text-rose-600 focus:ring-rose-500">
                <label for="isFeatured" class="text-xs font-bold text-slate-700 cursor-pointer">Feature on Homepage (Top showcase)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">Update Project</button>
            </div>
        </form>
    </div>
</div>
@endsection
