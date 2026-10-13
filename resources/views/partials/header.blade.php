<!-- Main Sticky Header (Matches ditstudio pure white navbar) -->
<header class="site-header" id="siteHeader">
    <div class="container">
        <div class="header-inner">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="site-logo" id="siteLogo" title="Triangle Interior Design">
                <img src="{{ asset('images/triangle-logo.svg') }}" alt="Triangle Interior Design" class="header-logo-img">
            </a>

            <!-- Desktop Navigation -->
            <nav class="main-nav" aria-label="Main Navigation">
                <ul class="nav-list">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('shop*') ? 'active' : '' }}">
                        <a href="{{ route('shop') }}" class="nav-link">Shop</a>
                    </li>
                    <!-- Projects Dropdown -->
                    <li class="nav-item has-dropdown {{ request()->routeIs('projects*') || request()->routeIs('project.*') ? 'active' : '' }}">
                        <a href="{{ route('projects') }}" class="nav-link">
                            Projects <i class="fas fa-chevron-down chevron"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ route('projects') }}">All Portfolio Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'bedroom-interior-design-projects-bangladesh') }}">Bedroom Design Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'master-bedroom-interior-design-projects-bangladesh') }}">Master Bedroom Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'kids-bedroom-interior-design-projects-bangladesh') }}">Kids Bedroom Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'guest-bedroom-interior-design-projects-bangladesh') }}">Guest Bedroom Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'living-room-interior-design-projects-bangladesh') }}">Living Room Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'dining-room-interior-design-projects-bangladesh') }}">Dining Room Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'kitchen-interior-design-projects-bangladesh') }}">Kitchen Design Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'modular-kitchen-projects-bangladesh') }}">Modular Kitchen Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'open-kitchen-design-projects-bangladesh') }}">Open Kitchen Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'common-area-interior-design-projects-bangladesh') }}">Common Area Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'cabinet-design-projects-bangladesh') }}">Cabinet Design Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'luxury-interior-design-projects') }}">Luxury Interior Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'modern-interior-design-projects') }}">Modern Interior Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'closet-design-projects-bangladesh') }}">Closet Design Projects</a></li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->routeIs('why.choose') ? 'active' : '' }}">
                        <a href="{{ route('why.choose') }}" class="nav-link">Why Choose Us?</a>
                    </li>
                    <!-- Services Dropdown -->
                    <li class="nav-item has-dropdown {{ request()->routeIs('services*') || request()->routeIs('service.*') ? 'active' : '' }}">
                        <a href="{{ route('services') }}" class="nav-link">
                            Our Services <i class="fas fa-chevron-down chevron"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ route('services') }}">Overview of All Services</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'home-interior-design') }}">Home Interior Design</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'custom-furniture-design') }}">Custom Furniture Design</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'bedroom-design') }}">Bedroom Interior Design</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'living-room-design') }}">Living Room Design</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'modular-kitchen-design') }}">Modular Kitchen Design</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'open-kitchen-design') }}">Open Kitchen Design</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'traditional-kitchen-design') }}">Traditional Kitchen Design</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'common-space-design') }}">Common Space Design</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'bathroom-design') }}">Bathroom Design</a></li>
                            <li class="dropdown-item"><a href="{{ route('service.detail', 'landscape-design') }}">Landscape Design</a></li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->routeIs('blogs*') || request()->routeIs('blog.*') ? 'active' : '' }}">
                        <a href="{{ route('blogs') }}" class="nav-link">Blogs</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('faqs') ? 'active' : '' }}">
                        <a href="{{ route('faqs') }}" class="nav-link">FAQs</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    </li>
                </ul>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions">
                <!-- Search Button -->
                <button type="button" class="header-search-btn" id="headerSearchBtn" aria-label="Search Website" title="Search">
                    <i class="fas fa-search"></i>
                </button>

                <!-- Cart Button (Desktop) -->
                <a href="{{ route('cart') }}" class="cart-toggle-btn desktop-only" aria-label="Shopping Cart" title="View Cart">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-badge">0</span>
                </a>

                <!-- Free Quote Button (Desktop) -->
                <button type="button" class="btn-consultation open-consultation-modal desktop-only" id="headerConsultBtn">
                    <i class="fas fa-calendar-check"></i> <span>Free Quote</span>
                </button>

                <!-- Mobile Hamburger Toggle -->
                <button type="button" class="mobile-toggle" id="mobileMenuToggle" aria-label="Open Navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Search Modal -->
<div class="search-modal-overlay" id="searchModal">
    <div class="search-modal-container">
        <div class="search-modal-header">
            <h3>Search Triangle Interior Design</h3>
            <button type="button" class="search-modal-close" id="searchModalClose" aria-label="Close">&times;</button>
        </div>
        <div class="search-modal-body">
            <div class="search-input-wrap">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="siteSearchInput" placeholder="Search projects, services (e.g., Bedroom, Kitchen, Gulshan, Living Room)..." autofocus>
            </div>
            <div class="search-quick-tags">
                <span class="tag-label">Popular:</span>
                <a href="{{ route('project.hub', 'bedroom-interior-design-projects-bangladesh') }}">Bedroom</a>
                <a href="{{ route('project.hub', 'modular-kitchen-projects-bangladesh') }}">Modular Kitchen</a>
                <a href="{{ route('project.hub', 'living-room-interior-design-projects-bangladesh') }}">Living Room</a>
                <a href="{{ route('project.hub', 'luxury-interior-design-projects') }}">Luxury Villa</a>
                <a href="{{ route('service.detail', 'custom-furniture-design') }}">Custom Furniture</a>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Navigation Drawer -->
<div class="mobile-nav-drawer" id="mobileNavDrawer">
    <div class="mobile-drawer-header">
        <img src="{{ asset('images/triangle-logo.svg') }}" alt="Triangle Interior Design" style="height:36px; width:auto;">
        <button class="mobile-nav-close" id="mobileDrawerClose" aria-label="Close Navigation">&times;</button>
    </div>
    <ul class="mobile-nav-list">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('shop') }}" class="{{ request()->routeIs('shop*') ? 'active' : '' }}">Shop Custom Furniture</a></li>
        <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'active' : '' }}">Completed Projects</a></li>
        <li><a href="{{ route('why.choose') }}" class="{{ request()->routeIs('why.choose') ? 'active' : '' }}">Why Choose Us</a></li>
        <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">Our 10 Services</a></li>
        <li><a href="{{ route('blogs') }}" class="{{ request()->routeIs('blogs*') ? 'active' : '' }}">Design Articles</a></li>
        <li><a href="{{ route('faqs') }}" class="{{ request()->routeIs('faqs') ? 'active' : '' }}">38 FAQs</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact & Studio</a></li>
    </ul>
    <div class="mobile-drawer-footer">
        <button class="btn btn-primary open-consultation-modal" style="width:100%; border-radius:50px; font-weight:700;">
            Book Free Consultation
        </button>
        <div class="mobile-drawer-contact">
            <div><a href="tel:+8801810536303" style="color:inherit;"><i class="fas fa-phone-alt"></i> +8801810536303</a></div>
            <div><a href="mailto:{{ $settings['email'] ?? 'info@triangleinterior.com' }}" style="color:inherit;"><i class="fas fa-envelope"></i> {{ $settings['email'] ?? 'info@triangleinterior.com' }}</a></div>
            <div><i class="fas fa-map-marker-alt"></i> Mohakhali New DOHS, Dhaka</div>
        </div>
    </div>
</div>

<!-- Mobile Drawer Backdrop Overlay -->
<div class="mobile-nav-overlay" id="mobileNavOverlay"></div>
