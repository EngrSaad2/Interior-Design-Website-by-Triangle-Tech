@extends('layouts.app')

@section('title', 'Checkout – DIT Studio Custom Furniture')
@section('meta_description', 'Complete your furniture purchase with DIT Studio.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:4rem 0 3rem 0;">
    <div class="container" style="text-align:center;">
        <h1 style="font-size:2.5rem; color:#fff; margin-bottom:0.5rem;">Checkout & Place Order</h1>
        <p style="color:#94a3b8;">Direct manufacturing order processed at our West Badda facility</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <form action="{{ route('inquiry.submit') }}" method="POST" id="checkoutForm">
            @csrf
            <input type="hidden" name="service_type" value="Custom Furniture Purchase Order">
            <input type="hidden" name="budget" id="checkoutTotalInput" value="0">
            <input type="hidden" name="message" id="checkoutItemsInput" value="">

            <div style="display:grid; grid-template-columns: 1.3fr 0.7fr; gap:3.5rem;">
                <!-- Billing Details -->
                <div style="background:#fff; border:1px solid var(--color-border-light); border-radius:var(--radius-md); padding:2.5rem;">
                    <h3 style="font-size:1.5rem; margin-bottom:1.5rem; padding-bottom:0.75rem; border-bottom:1px solid var(--color-border-light);">
                        Delivery & Customer Details
                    </h3>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem;">
                        <div class="form-group">
                            <label class="form-label" style="color:var(--color-dark);">Full Name *</label>
                            <input type="text" name="name" class="form-control" style="background:#f8fafc; color:#0e1013; border-color:#cbd5e1;" placeholder="e.g. Shakil Chowdhury" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" style="color:var(--color-dark);">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control" style="background:#f8fafc; color:#0e1013; border-color:#cbd5e1;" placeholder="e.g. 017XXXXXXXX" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" style="color:var(--color-dark);">Email Address</label>
                        <input type="email" name="email" class="form-control" style="background:#f8fafc; color:#0e1013; border-color:#cbd5e1;" placeholder="e.g. shakil@example.com">
                    </div>

                    <div class="form-group">
                        <label class="form-label" style="color:var(--color-dark);">Delivery Address *</label>
                        <input type="text" name="location" class="form-control" style="background:#f8fafc; color:#0e1013; border-color:#cbd5e1;" placeholder="House, Road, Area (e.g. House 45, Road 11, Banani, Dhaka)" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" style="color:var(--color-dark);">Order Notes / Custom Color Preferences</label>
                        <textarea class="form-control" style="background:#f8fafc; color:#0e1013; border-color:#cbd5e1;" rows="3" placeholder="Specify any custom wood finishes, handles or delivery instructions..."></textarea>
                    </div>

                    <h4 style="font-size:1.2rem; margin-top:2rem; margin-bottom:1rem;">Payment Method</h4>
                    <div style="display:flex; flex-direction:column; gap:0.75rem;">
                        <label style="display:flex; align-items:center; gap:0.75rem; padding:1rem; border:1px solid var(--color-border-light); border-radius:var(--radius-sm); cursor:pointer;">
                            <input type="radio" name="payment_method" value="cod" checked>
                            <strong>Cash on Delivery (Advance 20% on Confirmation)</strong>
                        </label>
                        <label style="display:flex; align-items:center; gap:0.75rem; padding:1rem; border:1px solid var(--color-border-light); border-radius:var(--radius-sm); cursor:pointer;">
                            <input type="radio" name="payment_method" value="bank">
                            <strong>Bank Transfer / bKash Merchant</strong>
                        </label>
                    </div>
                </div>

                <!-- Order Summary -->
                <div>
                    <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); border-radius:var(--radius-md); padding:2rem; position:sticky; top:110px;">
                        <h3 style="font-size:1.35rem; margin-bottom:1.25rem;">Your Order</h3>
                        <div id="checkoutItemsList" style="border-bottom:1px solid var(--color-border-light); padding-bottom:1rem; margin-bottom:1rem;">
                            <!-- Injected by JS -->
                        </div>

                        <div style="display:flex; justify-content:space-between; margin-bottom:0.75rem; color:var(--color-text-muted);">
                            <span>Subtotal:</span>
                            <span id="checkoutSubtotal" style="font-weight:700; color:var(--color-dark);">৳ 0</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; margin-bottom:1.25rem; color:var(--color-text-muted);">
                            <span>Shipping:</span>
                            <span style="font-weight:700; color:#10b981;">Free Delivery</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; border-top:1px solid var(--color-border-light); padding-top:1rem; margin-bottom:2rem; font-size:1.3rem; font-weight:800; color:var(--color-primary-dark);">
                            <span>Total Due:</span>
                            <span id="checkoutGrandTotal">৳ 0</span>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width:100%; padding:1rem; font-size:1.05rem;">
                            <i class="fas fa-lock" style="margin-right:0.4rem;"></i> Confirm & Place Order
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const listEl = document.getElementById('checkoutItemsList');
    const subtotalEl = document.getElementById('checkoutSubtotal');
    const grandTotalEl = document.getElementById('checkoutGrandTotal');
    const totalInput = document.getElementById('checkoutTotalInput');
    const itemsInput = document.getElementById('checkoutItemsInput');

    const items = cart.items || [];
    if (items.length === 0) {
        listEl.innerHTML = '<p style="color:#ef4444;">Your bag is currently empty.</p>';
    } else {
        listEl.innerHTML = items.map(item => `
            <div style="display:flex; justify-content:space-between; margin-bottom:0.6rem; font-size:0.9rem;">
                <span>${item.title} x ${item.qty}</span>
                <span style="font-weight:600;">৳ ${(item.price * item.qty).toLocaleString()}</span>
            </div>
        `).join('');

        const total = cart.getTotal();
        subtotalEl.textContent = '৳ ' + total.toLocaleString();
        grandTotalEl.textContent = '৳ ' + total.toLocaleString();
        totalInput.value = total;
        itemsInput.value = items.map(i => `${i.title} (${i.qty}x)`).join(', ');
    }

    document.getElementById('checkoutForm')?.addEventListener('submit', function() {
        localStorage.removeItem('dit_cart');
    });
});
</script>
@endpush
@endsection
