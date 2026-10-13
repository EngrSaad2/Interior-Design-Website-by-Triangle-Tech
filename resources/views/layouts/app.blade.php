<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Best Interior Design Company in Bangladesh – DIT Studio')</title>
    <meta name="description" content="@yield('meta_description', 'Looking for the best interior design company in Bangladesh? DIT Studio has delivered 500+ stunning homes in Dhaka & Chittagong. Get a free quote!')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / SEO -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="DIT Studio - Interior Specialist" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title', 'Best Interior Design Company in Bangladesh – DIT Studio')" />
    <meta property="og:description" content="@yield('meta_description', 'DIT Studio - Leading Interior Design firm with 500+ projects completed.')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/dit-studio-logo.webp') }}" />

    <!-- Google Fonts: Outfit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 (Strict compliance: No AI sparkle or magic wand icons used) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @stack('styles')
</head>
<body>
    @include('partials.header')

    <main>
        @if(session('success'))
            <div style="background: #10b981; color:#fff; text-align:center; padding:1rem; font-weight:600;">
                <i class="fas fa-check-circle" style="margin-right:0.5rem;"></i> {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Floating Actions -->
    <div class="floating-actions">
        <a href="https://wa.me/8801633033033" target="_blank" rel="noopener noreferrer" class="float-btn float-whatsapp" title="Chat on WhatsApp" id="floatingWhatsappBtn">
            <i class="fab fa-whatsapp"></i>
        </a>
        <button class="float-btn float-top" title="Back to Top" id="backToTopBtn">
            <i class="fas fa-chevron-up"></i>
        </button>
    </div>

    <!-- Free Consultation Modal -->
    <div class="modal-overlay" id="consultationModal">
        <div class="modal-dialog">
            <button class="modal-close" aria-label="Close Modal">&times;</button>
            <h3 style="color:#ffffff; font-size:1.6rem; margin-bottom:0.5rem; font-family:var(--font-heading);">Book A Free Consultation</h3>
            <p style="color:#94a3b8; font-size:0.9rem; margin-bottom:1.5rem;">Speak directly with our senior interior architects & get an itemized budget quote.</p>

            <form action="{{ route('inquiry.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="modal_name">Your Name *</label>
                    <input type="text" name="name" id="modal_name" class="form-control" placeholder="e.g. Tanvir Ahmed" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="modal_phone">Phone Number *</label>
                    <input type="tel" name="phone" id="modal_phone" class="form-control" placeholder="e.g. 01700000000" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="modal_location">Project Location</label>
                    <input type="text" name="location" id="modal_location" class="form-control" placeholder="e.g. Gulshan 2, Dhaka">
                </div>
                <div class="form-group">
                    <label class="form-label" for="modal_service">Service Required</label>
                    <select name="service_type" id="modal_service" class="form-control">
                        <option value="Full Home Interior">Full Home Interior</option>
                        <option value="Modular Kitchen Design">Modular Kitchen Design</option>
                        <option value="Bedroom Interior Design">Bedroom Interior Design</option>
                        <option value="Custom Furniture">Custom Furniture</option>
                        <option value="Office / Commercial Interior">Office / Commercial Interior</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="modal_message">Message / Scope</label>
                    <textarea name="message" id="modal_message" class="form-control" rows="3" placeholder="Tell us about your apartment size, preferences, or timeline..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%; margin-top:0.5rem;">
                    <i class="fas fa-paper-plane"></i> Submit Request
                </button>
            </form>
        </div>
    </div>

    <!-- Slide-over Cart Drawer -->
    <div class="modal-overlay" id="cartDrawer" style="justify-content: flex-end; padding:0;">
        <div style="background:#14171d; width:100%; max-width:400px; height:100vh; padding:2rem; display:flex; flex-direction:column; border-left:1px solid rgba(197,168,128,0.3);">
            <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid rgba(255,255,255,0.08); padding-bottom:1rem;">
                <h4 style="color:#ffffff; font-size:1.25rem;"><i class="fas fa-shopping-bag" style="color:var(--color-primary); margin-right:0.5rem;"></i> Shopping Bag</h4>
                <button class="cart-drawer-close" style="background:none; border:none; color:#94a3b8; font-size:1.5rem; cursor:pointer;">&times;</button>
            </div>
            <div id="cartDrawerItems" style="flex-grow:1; overflow-y:auto; padding:1rem 0;"></div>
            <div style="border-top:1px solid rgba(255,255,255,0.08); padding-top:1.25rem;">
                <div style="display:flex; justify-content:space-between; color:#ffffff; font-size:1.1rem; font-weight:700; margin-bottom:1.25rem;">
                    <span>Total Amount:</span>
                    <span id="cartDrawerTotal" style="color:var(--color-primary);">৳ 0</span>
                </div>
                <a href="{{ route('checkout') }}" class="btn btn-primary" style="width:100%; margin-bottom:0.75rem;">Proceed to Checkout</a>
                <a href="{{ route('cart') }}" class="btn btn-outline-white" style="width:100%;">View Full Cart</a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
