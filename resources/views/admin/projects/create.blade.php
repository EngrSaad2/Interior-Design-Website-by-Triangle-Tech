@extends('admin.layout')

@section('title', 'Add New Project')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Add Portfolio Project</h1>
            <p class="text-xs text-slate-500 mt-1">Add a new completed handover project with photos &amp; technical specs.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Projects
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Project Title *</label>
                    <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. 3200 Sqft Luxury Duplex – Gulshan 2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Custom Slug (Optional)</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" placeholder="e.g. luxury-duplex-gulshan-2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Category</label>
                    <input type="text" name="category" list="categoryList" value="{{ old('category', 'Master Bedroom Interior') }}" placeholder="Choose or type..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                    <datalist id="categoryList">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->name }}">
                        @endforeach
                    </datalist>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Location</label>
                    <input type="text" name="location" value="{{ old('location', 'Gulshan 2, Dhaka') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Area (Sqft)</label>
                    <input type="text" name="area_sqft" value="{{ old('area_sqft', '2400') }}" placeholder="e.g. 2400" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Completion Year</label>
                    <input type="text" name="completion_year" value="{{ old('completion_year', date('Y')) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Client Name</label>
                    <input type="text" name="client_name" value="{{ old('client_name') }}" placeholder="e.g. Private Client" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Budget Range</label>
                    <input type="text" name="budget_range" value="{{ old('budget_range') }}" placeholder="e.g. ৳25 Lakh - ৳35 Lakh" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Project Story &amp; Spatial Details</label>
                <textarea name="description" rows="5" placeholder="Detailed architectural description, color palettes, materials used..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Featured Main Image</label>
                    <input type="file" name="featured_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Additional Gallery Photos (Multiple)</label>
                    <input type="file" name="gallery[]" multiple accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                </div>
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_featured" id="isFeatured" value="1" class="rounded border-slate-300 text-rose-600 focus:ring-rose-500">
                <label for="isFeatured" class="text-xs font-bold text-slate-700 cursor-pointer">Feature on Homepage (Top showcase)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">Save Project</button>
            </div>
        </form>
    </div>
</div>
@endsection
