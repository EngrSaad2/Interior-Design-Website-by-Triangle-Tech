@extends('admin.layout')

@section('title', 'Edit Custom Furniture')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Edit Custom Furniture</h1>
            <p class="text-xs text-slate-500 mt-1">Update product pricing, photo, specs &amp; inventory details.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Furniture
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Product Title *</label>
                    <input type="text" name="title" required value="{{ old('title', $product->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $product->slug) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Category</label>
                    <input type="text" name="category" list="catList" value="{{ old('category', $product->category) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                    <datalist id="catList">
                        @foreach($categories as $c)
                            <option value="{{ $c->name }}">
                        @endforeach
                    </datalist>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Regular Price (৳)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Sale Price (৳)</label>
                    <input type="number" step="0.01" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Stock Status</label>
                    <select name="stock_status" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                        <option value="in_stock" {{ $product->stock_status === 'in_stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="made_to_order" {{ $product->stock_status === 'made_to_order' ? 'selected' : '' }}>Made To Order (Factory)</option>
                        <option value="out_of_stock" {{ $product->stock_status === 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">SKU Code</label>
                    <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Dimensions</label>
                    <input type="text" name="dimensions" value="{{ old('dimensions', $product->dimensions) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Material</label>
                    <input type="text" name="material" value="{{ old('material', $product->material) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Price Label Text (Optional)</label>
                    <input type="text" name="price_text" value="{{ old('price_text', $product->price_text) }}" placeholder="e.g. Starting from ৳45,000" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Short Description</label>
                <textarea name="short_description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('short_description', $product->short_description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Full Description</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Current Photo</label>
                <img src="{{ asset($product->image ?? 'images/banner-1.webp') }}" class="w-32 h-32 rounded-2xl object-cover border border-slate-200 mb-3" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Replace Photo</label>
                <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_featured" id="isFeatured" value="1" {{ $product->is_featured ? 'checked' : '' }} class="rounded border-slate-300 text-rose-600 focus:ring-rose-500">
                <label for="isFeatured" class="text-xs font-bold text-slate-700 cursor-pointer">Feature on Homepage</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">Update Furniture</button>
            </div>
        </form>
    </div>
</div>
@endsection
