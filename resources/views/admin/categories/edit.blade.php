@extends('admin.layout')

@section('title', 'Edit Category')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Edit Category</h1>
            <p class="text-xs text-slate-500 mt-1">Update category taxonomy details.</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Categories
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Category Name *</label>
                <input type="text" name="name" required value="{{ old('name', $category->name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Category Type *</label>
                <select name="type" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                    <option value="project" {{ $category->type === 'project' ? 'selected' : '' }}>Project Category</option>
                    <option value="product" {{ $category->type === 'product' ? 'selected' : '' }}>Furniture Product Category</option>
                    <option value="service" {{ $category->type === 'service' ? 'selected' : '' }}>Service Category</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Description (Optional)</label>
                <textarea name="description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">Update Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
