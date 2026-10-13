@extends('layouts.app')

@section('title', 'Custom Furniture Shop – Triangle Interior Design Handcrafted Pieces')
@section('meta_description', 'Shop architectural bespoke furniture designed and manufactured by Triangle Interior Design. Handcrafted in Dhaka using premium imported boards and German Blum hardware.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <span class="section-subtitle">Factory Direct Custom Furniture</span>
        <h1 style="font-size:3rem; color:#fff; margin-bottom:1rem;">Triangle Interior Design Furniture Collection</h1>
        <p style="color:#94a3b8; max-width:650px; margin:0 auto; font-size:1.1rem;">
            Custom engineered cabinetry, study tables, closets, and accent pieces handcrafted in our West Badda workshop.
        </p>
    </div>
</section>

<section class="section-padding" style="background:var(--color-bg-light);">
    <div class="container">
        <div class="products-grid">
            @forelse($products as $product)
                <div class="product-card">
                    <div class="product-card-thumb">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" onerror="this.src='{{ asset('images/Aella90-300x300.webp') }}'">
                    </div>
                    <div class="product-card-body">
                        <span style="font-size:0.75rem; text-transform:uppercase; color:var(--color-primary-dark); font-weight:700;">{{ $product->category ?? 'Custom Furniture' }}</span>
                        <h2 class="product-card-title" style="margin-top:0.3rem;">
                            <a href="{{ route('product.detail', $product->slug) }}">{{ $product->title }}</a>
                        </h2>
                        <div class="product-card-price">{{ $product->price_text ?? ('৳ ' . number_format($product->price)) }}</div>
                        <div style="display:flex; gap:0.5rem;">
                            <button type="button" class="btn btn-dark btn-add-to-cart" style="flex:1; padding:0.65rem; font-size:0.85rem;"
                                    data-id="{{ $product->id }}"
                                    data-title="{{ $product->title }}"
                                    data-price="{{ $product->price }}"
                                    data-image="{{ asset($product->image) }}">
                                <i class="fas fa-shopping-bag"></i> Add to Bag
                            </button>
                            <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-outline-white" style="color:var(--color-dark); border-color:var(--color-border-light); padding:0.65rem 0.9rem;">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column:1 / -1; text-align:center; padding:4rem;">
                    <h3>No products available</h3>
                </div>
            @endforelse
        </div>

        <div style="margin-top:3.5rem; display:flex; justify-content:center;">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
