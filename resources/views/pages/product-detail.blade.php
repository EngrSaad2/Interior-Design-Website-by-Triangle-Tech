@extends('layouts.app')

@section('title', $product->title . ' – Triangle Interior Design Custom Furniture')
@section('meta_description', Str::limit(strip_tags($product->short_description ?: $product->description), 155))

@section('content')
<section style="background:#0e1013; color:#fff; padding:3.5rem 0 2.5rem 0; border-bottom:1px solid rgba(255,255,255,0.08);">
    <div class="container">
        <div style="display:flex; gap:0.75rem; align-items:center; font-size:0.85rem; color:#94a3b8;">
            <a href="{{ route('home') }}" style="color:#cbd5e1;">Home</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <a href="{{ route('shop') }}" style="color:#cbd5e1;">Shop</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <span style="color:var(--color-primary);">{{ $product->title }}</span>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:4rem; align-items:flex-start;">
            <!-- Product Image -->
            <div style="border-radius:var(--radius-lg); overflow:hidden; border:1px solid var(--color-border-light); background:#f8fafc; box-shadow:var(--shadow-md);">
                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" style="width:100%; max-height:550px; object-fit:contain;" onerror="this.src='{{ asset('images/Aella90-300x300.webp') }}'">
            </div>

            <!-- Product Details -->
            <div>
                <span style="color:var(--color-primary-dark); font-weight:700; text-transform:uppercase; font-size:0.85rem; letter-spacing:0.1em;">
                    {{ $product->category ?? 'Custom Furniture' }}
                </span>
                <h1 style="font-size:2.5rem; margin-top:0.5rem; margin-bottom:1rem;">{{ $product->title }}</h1>
                
                <div style="font-size:2rem; font-weight:800; color:var(--color-primary-dark); font-family:var(--font-heading); margin-bottom:1.5rem;">
                    {{ $product->price_text ?? ('৳ ' . number_format($product->price)) }}
                </div>

                <div style="display:inline-flex; align-items:center; gap:0.5rem; background:#dcfce7; color:#15803d; padding:0.35rem 0.85rem; border-radius:var(--radius-full); font-size:0.8rem; font-weight:700; margin-bottom:2rem;">
                    <i class="fas fa-check"></i> Made to Order (In-House Factory Build)
                </div>

                <div style="font-size:1.05rem; line-height:1.7; color:var(--color-text-main); margin-bottom:2rem; white-space:pre-line;">
                    {{ $product->description }}
                </div>

                <!-- Specs Table -->
                <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); border-radius:var(--radius-md); padding:1.5rem; margin-bottom:2.5rem;">
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; font-size:0.9rem;">
                        <div>
                            <span style="color:var(--color-text-muted); display:block;">Materials:</span>
                            <strong>{{ $product->material ?? 'Gorjon Marine Plywood & Action TESA HDF' }}</strong>
                        </div>
                        <div>
                            <span style="color:var(--color-text-muted); display:block;">Dimensions:</span>
                            <strong>{{ $product->dimensions ?? 'Standard / Custom Made' }}</strong>
                        </div>
                        <div>
                            <span style="color:var(--color-text-muted); display:block;">Hardware:</span>
                            <strong>Blum / Hafele Soft-Close</strong>
                        </div>
                        <div>
                            <span style="color:var(--color-text-muted); display:block;">Warranty:</span>
                            <strong>5 Years Official Warranty</strong>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="display:flex; gap:1rem; flex-wrap:wrap;">
                    <button type="button" class="btn btn-primary btn-add-to-cart" style="flex:1; padding:1rem;"
                            data-id="{{ $product->id }}"
                            data-title="{{ $product->title }}"
                            data-price="{{ $product->price }}"
                            data-image="{{ asset($product->image) }}">
                        <i class="fas fa-shopping-bag"></i> Add to Shopping Bag
                    </button>
                    <a href="https://wa.me/8801810536303?text=Hi%20Triangle%20Studio,%20I%20want%20to%20order%20{{ urlencode($product->title) }}" target="_blank" rel="noopener noreferrer" class="btn" style="background:#25d366; color:#fff; padding:1rem 1.5rem;">
                        <i class="fab fa-whatsapp"></i> Order on WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->isNotEmpty())
            <div style="margin-top:6rem; border-top:1px solid var(--color-border-light); padding-top:4rem;">
                <h3 style="font-size:2rem; margin-bottom:2rem; text-align:center;">Related Custom Furniture</h3>
                <div class="products-grid">
                    @foreach($relatedProducts as $rel)
                        <div class="product-card">
                            <div class="product-card-thumb">
                                <img src="{{ asset($rel->image) }}" alt="{{ $rel->title }}" onerror="this.src='{{ asset('images/Aella90-300x300.webp') }}'">
                            </div>
                            <div class="product-card-body">
                                <h4 class="product-card-title"><a href="{{ route('product.detail', $rel->slug) }}">{{ $rel->title }}</a></h4>
                                <div class="product-card-price">{{ $rel->price_text ?? ('৳ ' . number_format($rel->price)) }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
