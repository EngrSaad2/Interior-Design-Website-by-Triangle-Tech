@extends('layouts.app')

@section('title', 'Shopping Cart – Triangle Interior Design Custom Furniture')
@section('meta_description', 'Review your selected custom furniture items from Triangle Interior Design.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:4rem 0 3rem 0;">
    <div class="container" style="text-align:center;">
        <h1 style="font-size:2.5rem; color:#fff; margin-bottom:0.5rem;">Your Shopping Bag</h1>
        <p style="color:#94a3b8;">Review your items before proceeding to checkout</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div id="fullCartView" style="display:grid; grid-template-columns: 2fr 1fr; gap:3rem;">
            <div>
                <div id="fullCartItems" style="background:#fff; border:1px solid var(--color-border-light); border-radius:var(--radius-md); padding:1.5rem;">
                    <!-- JS Injected -->
                </div>
            </div>
            <div>
                <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); border-radius:var(--radius-md); padding:2rem;">
                    <h3 style="font-size:1.35rem; margin-bottom:1.25rem;">Order Summary</h3>
                    <div style="display:flex; justify-content:space-between; margin-bottom:1rem; color:var(--color-text-muted);">
                        <span>Subtotal:</span>
                        <span id="fullCartSubtotal" style="font-weight:700; color:var(--color-dark);">৳ 0</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; margin-bottom:1.5rem; color:var(--color-text-muted);">
                        <span>Delivery (Dhaka Metro):</span>
                        <span style="font-weight:700; color:#10b981;">Free</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; border-top:1px solid var(--color-border-light); padding-top:1rem; margin-bottom:2rem; font-size:1.25rem; font-weight:800; color:var(--color-primary-dark);">
                        <span>Total:</span>
                        <span id="fullCartTotal">৳ 0</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn btn-primary" style="width:100%; padding:0.95rem; font-size:1rem;">
                        Proceed to Checkout
                    </a>
                    <a href="{{ route('shop') }}" class="btn btn-outline-white" style="width:100%; margin-top:0.75rem; color:var(--color-dark); border-color:var(--color-border-light);">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    function renderFullCart() {
        const container = document.getElementById('fullCartItems');
        const subtotalEl = document.getElementById('fullCartSubtotal');
        const totalEl = document.getElementById('fullCartTotal');
        const items = cart.items;

        if (!items || items.length === 0) {
            container.innerHTML = `
                <div style="text-align:center; padding:4rem 1rem;">
                    <i class="fas fa-shopping-bag" style="font-size:3rem; color:#cbd5e1; margin-bottom:1rem;"></i>
                    <h3>Your bag is empty</h3>
                    <p style="color:#64748b; margin-bottom:1.5rem;">Browse our bespoke custom furniture collections</p>
                    <a href="{{ route('shop') }}" class="btn btn-primary">Go to Furniture Store</a>
                </div>
            `;
            if (subtotalEl) subtotalEl.textContent = '৳ 0';
            if (totalEl) totalEl.textContent = '৳ 0';
            return;
        }

        container.innerHTML = items.map(item => `
            <div style="display:flex; align-items:center; gap:1.5rem; padding:1.25rem 0; border-bottom:1px solid var(--color-border-light);">
                <img src="${item.image}" alt="${item.title}" style="width:80px; height:80px; object-fit:cover; border-radius:8px;">
                <div style="flex-grow:1;">
                    <h4 style="font-size:1.05rem; margin-bottom:0.25rem;">${item.title}</h4>
                    <div style="color:var(--color-primary-dark); font-weight:700;">৳ ${item.price.toLocaleString()}</div>
                </div>
                <div style="display:flex; align-items:center; gap:0.5rem;">
                    <button onclick="cart.updateQty('${item.id}', -1); renderFullCart();" class="btn" style="padding:0.25rem 0.6rem; background:#eee;">-</button>
                    <span style="font-weight:700; min-width:24px; text-align:center;">${item.qty}</span>
                    <button onclick="cart.updateQty('${item.id}', 1); renderFullCart();" class="btn" style="padding:0.25rem 0.6rem; background:#eee;">+</button>
                </div>
                <div style="font-weight:800; font-size:1.1rem; min-width:100px; text-align:right;">
                    ৳ ${(item.price * item.qty).toLocaleString()}
                </div>
                <button onclick="cart.removeItem('${item.id}'); renderFullCart();" style="background:none; border:none; color:#ef4444; font-size:1.1rem; cursor:pointer; margin-left:1rem;">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        `).join('');

        const total = cart.getTotal();
        if (subtotalEl) subtotalEl.textContent = '৳ ' + total.toLocaleString();
        if (totalEl) totalEl.textContent = '৳ ' + total.toLocaleString();
    }

    renderFullCart();
    window.renderFullCart = renderFullCart;
});
</script>
@endpush
@endsection
