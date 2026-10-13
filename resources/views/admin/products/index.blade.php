@extends('admin.layout')

@section('title', 'Custom Furniture Catalog')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Custom Furniture CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Manage factory-direct furniture catalog, pricing, materials &amp; stock status.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="px-4 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New Product
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-semibold border-b border-slate-100">
                    <tr>
                        <th class="p-4">Photo</th>
                        <th class="p-4">Title &amp; SKU</th>
                        <th class="p-4">Category</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Stock</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($products as $product)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="p-4">
                                <img src="{{ asset($product->image ?? 'images/banner-1.webp') }}" class="w-14 h-14 rounded-xl object-cover border border-slate-200" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                            </td>
                            <td class="p-4 font-bold text-slate-800">
                                <div>{{ $product->title }}</div>
                                <span class="font-mono text-[10px] text-slate-400 font-normal">SKU: {{ $product->sku ?? 'N/A' }}</span>
                            </td>
                            <td class="p-4 text-slate-600">
                                <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-medium">
                                    {{ $product->category ?? 'Furniture' }}
                                </span>
                            </td>
                            <td class="p-4 font-semibold text-slate-800">
                                @if($product->price > 0)
                                    <div>৳{{ number_format($product->price, 0) }}</div>
                                    @if($product->sale_price)
                                        <span class="text-[10px] text-rose-600 font-bold block">Sale: ৳{{ number_format($product->sale_price, 0) }}</span>
                                    @endif
                                @else
                                    <span class="text-slate-500 font-normal">{{ $product->price_text ?? 'Price on Call' }}</span>
                                @endif
                            </td>
                            <td class="p-4">
                                @if($product->stock_status === 'in_stock')
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">In Stock</span>
                                @elseif($product->stock_status === 'made_to_order')
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Made to Order</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-600 border border-rose-200">Out of Stock</span>
                                @endif
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('product.detail', $product->slug) }}" target="_blank" class="p-2 rounded-lg bg-slate-100 hover:bg-slate-200 transition-colors inline-block" title="View on site">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="p-2 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-600 transition-colors inline-block" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this product?');">
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
                                No furniture products found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
