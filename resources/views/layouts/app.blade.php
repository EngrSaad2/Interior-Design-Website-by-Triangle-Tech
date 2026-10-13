<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Interior Design Website – Best Interior Design Company in Bangladesh | Triangle Interior Design')</title>
    <meta name="description" content="@yield('meta_description', 'Triangle Interior Design is the top-rated Interior Design Website and fit-out firm in Bangladesh. Discover award-winning residential & commercial interior architecture, luxury living, and custom factory joinery. Call +8801810536303.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Interior Design Website, best interior design website, luxury interior design website, modern interior design website, interior design website bangladesh, interior design company dhaka, best interior designer, luxury home interior, modular kitchen design dhaka, duplex interior design, turnkey interior firm, apartment interior design, office interior design bangladesh')">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="Triangle Interior Design">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <meta name="theme-color" content="#111317">

    <!-- Local SEO Geotags -->
    <meta name="geo.region" content="BD-13">
    <meta name="geo.placename" content="Dhaka, Bangladesh">
    <meta name="geo.position" content="23.777176;90.399452">
    <meta name="ICBM" content="23.777176, 90.399452">

    <!-- Open Graph (Facebook / LinkedIn / WhatsApp) -->
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="Triangle Interior Design">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('title', 'Interior Design Website – Best Interior Design Company in Bangladesh | Triangle Interior Design')">
    <meta property="og:description" content="@yield('meta_description', 'Triangle Interior Design - Leading Interior Design Website with 500+ projects completed.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/banner-4.webp'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Interior Design Website – Best Interior Design Company in Bangladesh | Triangle Interior Design')">
    <meta name="twitter:description" content="@yield('meta_description', 'Looking for the best Interior Design Website in Bangladesh? 500+ homes delivered.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/banner-4.webp'))">

    <!-- Schema.org JSON-LD Structured Data for Google Rich Results -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@graph": [
        {
          "@@type": ["HomeAndConstructionBusiness", "ProfessionalService"],
          "@@id": "{{ url('/') }}/#organization",
          "name": "Triangle Interior Design - Interior Design Website",
          "description": "Premier Interior Design Website in Bangladesh for turnkey residential and commercial architecture, joinery, and interior design.",
          "url": "{{ url('/') }}",
          "logo": "{{ asset('images/triangle-logo.svg') }}",
          "image": "{{ asset('images/banner-4.webp') }}",
          "telephone": "+8801810536303",
          "email": "info@triangleinterior.com",
          "priceRange": "৳৳ - ৳৳৳",
          "address": {
            "@@type": "PostalAddress",
            "streetAddress": "House 127 (2nd floor), Road 05, Mohakhali New DOHS",
            "addressLocality": "Dhaka",
            "postalCode": "1206",
            "addressCountry": "BD"
          },
          "geo": {
            "@@type": "GeoCoordinates",
            "latitude": "23.777176",
            "longitude": "90.399452"
          },
          "openingHoursSpecification": [
            {
              "@@type": "OpeningHoursSpecification",
              "dayOfWeek": ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday"],
              "opens": "09:00",
              "closes": "18:00"
            }
          ],
          "sameAs": [
            "https://www.facebook.com/dit.interior/",
            "https://www.linkedin.com/company/ditstudio/",
            "https://www.youtube.com/@ditstudiobd",
            "https://www.pinterest.com/ditstudiobd/"
          ],
          "aggregateRating": {
            "@@type": "AggregateRating",
            "ratingValue": "4.9",
            "reviewCount": "128",
            "bestRating": "5",
            "worstRating": "1"
          }
        },
        {
          "@@type": "WebSite",
          "@@id": "{{ url('/') }}/#website",
          "url": "{{ url('/') }}",
          "name": "Triangle Interior Design – Interior Design Website",
          "description": "Leading Interior Design Website in Bangladesh showcasing turnkey residential, commercial, and modular furniture architecture.",
          "potentialAction": {
            "@@type": "SearchAction",
            "target": {
              "@@type": "EntryPoint",
              "urlTemplate": "{{ url('/projects?search={search_term_string}') }}"
            },
            "query-input": "required name=search_term_string"
          }
        }
      ]
    }
    </script>

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

    <!-- Floating Red Cart Basket (Matches ditstudio pink/red badge with '0') -->
    <a href="{{ route('cart') }}" class="floating-cart-basket" id="floatingCartBasket" title="Shopping Cart" aria-label="Shopping Cart">
        <i class="fas fa-shopping-bag"></i>
        <span class="basket-count" id="floatingCartCount">0</span>
    </a>

    <!-- Floating Actions (WhatsApp) -->
    <div class="floating-actions">
        <a href="https://wa.me/8801810536303" target="_blank" rel="noopener noreferrer" class="float-btn float-whatsapp" title="Chat on WhatsApp" id="floatingWhatsappBtn" aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- Mobile Sticky Bottom Action Bar (Matches ditstudio CALL NOW | WHATSAPP) -->
    <div class="mobile-sticky-bottom-bar" id="mobileStickyBottomBar">
        <a href="tel:+8801810536303" class="bottom-action-btn bottom-call-btn" id="mobileBottomCallBtn">
            CALL NOW
        </a>
        <a href="https://wa.me/8801810536303" class="bottom-action-btn bottom-whatsapp-btn" id="mobileBottomWhatsappBtn" target="_blank" rel="noopener noreferrer">
            WHATSAPP
        </a>
    </div>

    <!-- Free Consultation Modal -->
    <div class="modal-overlay" id="consultationModal">
        <div class="modal-dialog">
            <button class="modal-close" id="consultationModalClose" aria-label="Close Modal">&times;</button>
            <h3 style="color:#ffffff; font-size:1.6rem; margin-bottom:0.5rem; font-family:var(--font-heading);">Book Free 3D Consultation</h3>
            <p style="color:#94a3b8; font-size:0.9rem; margin-bottom:1.5rem;">Speak with Triangle Interior Design senior architects & get an itemized budget quote.</p>

            <form action="{{ route('inquiry.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="modal_name">Your Name *</label>
                    <input type="text" name="name" id="modal_name" class="form-control" placeholder="e.g. Tanvir Ahmed" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="modal_phone">Phone Number *</label>
                    <input type="tel" name="phone" id="modal_phone" class="form-control" placeholder="e.g. +8801810536303" required>
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
                <button class="cart-drawer-close" id="cartDrawerClose" style="background:none; border:none; color:#94a3b8; font-size:1.5rem; cursor:pointer;" aria-label="Close Cart">&times;</button>
            </div>
            <div id="cartDrawerItems" style="flex-grow:1; overflow-y:auto; padding:1rem 0;">
                <p style="color:#94a3b8; text-align:center; padding-top:2rem;">Your cart is currently empty.</p>
            </div>
            <div style="border-top:1px solid rgba(255,255,255,0.08); padding-top:1.25rem;">
                <div style="display:flex; justify-content:space-between; color:#ffffff; font-size:1.1rem; font-weight:700; margin-bottom:1.25rem;">
                    <span>Total Amount:</span>
                    <span id="cartDrawerTotal" style="color:var(--color-primary);">৳ 0</span>
                </div>
                <a href="{{ route('checkout') }}" class="btn btn-primary" style="width:100%; margin-bottom:0.75rem;">Proceed to Checkout</a>
                <a href="{{ route('shop') }}" class="btn btn-outline-white" style="width:100%;">Continue Shopping</a>
            </div>
        </div>
    </div>

    <!-- Core Scripts -->
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
