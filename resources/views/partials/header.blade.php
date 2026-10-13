<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <a href="tel:{{ $settings['phone'] ?? '+8801633033033' }}" id="topBarPhone">
                <i class="fas fa-phone-alt" style="color:var(--color-primary);"></i> {{ $settings['phone_display'] ?? '01633 033 033' }}
            </a>
            <a href="mailto:{{ $settings['email'] ?? 'info.ditbd@gmail.com' }}" id="topBarEmail">
                <i class="fas fa-envelope" style="color:var(--color-primary);"></i> {{ $settings['email'] ?? 'info.ditbd@gmail.com' }}
            </a>
            <span class="top-bar-hours">
                <i class="fas fa-clock" style="color:var(--color-primary);"></i> Sat - Thu: 9:00 AM - 6:00 PM
            </span>
        </div>
        <div class="top-bar-right">
            <span><i class="fas fa-map-marker-alt" style="color:var(--color-primary);"></i> Mohakhali New DOHS, Dhaka</span>
            <div class="top-bar-socials">
                <a href="{{ $settings['facebook'] ?? 'https://www.facebook.com/dit.interior/' }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $settings['youtube'] ?? 'https://www.youtube.com/channel/UCH_kEOE-o6hlo1X1DVermTQ' }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="{{ $settings['whatsapp'] ?? 'https://wa.me/8801633033033' }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Main Sticky Header -->
<header class="site-header" id="siteHeader">
    <div class="container">
        <div class="header-inner">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="site-logo" id="siteLogo">
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
                    <li class="nav-item {{ request()->routeIs('projects*') || request()->routeIs('project.*') ? 'active' : '' }}">
                        <a href="{{ route('projects') }}" class="nav-link">
                            Projects <i class="fas fa-chevron-down chevron"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ route('projects') }}">All Portfolio Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'bedroom-interior-design-projects-bangladesh') }}">Bedroom Design Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'master-bedroom-interior-design-projects-bangladesh') }}">Master Bedroom Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'kids-bedroom-interior-design-projects-bangladesh') }}">Kids Bedroom Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'living-room-interior-design-projects-bangladesh') }}">Living Room Projects</a></li>
                            <li class="dropdown-item"><a href="{{ route('project.hub', 'dining-room-interior-design-projects-bangladesh') }}">Dining Room Projects</a></li>
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
                    <li class="nav-item {{ request()->routeIs('services*') || request()->routeIs('service.*') ? 'active' : '' }}">
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
                <button type="button" class="cart-toggle-btn" aria-label="Shopping Cart">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-badge">0</span>
                </button>

                <button type="button" class="btn-consultation open-consultation-modal" id="headerConsultBtn">
                    <i class="fas fa-calendar-check"></i> <span>Free Quote</span>
                </button>

                <button type="button" class="mobile-toggle" aria-label="Open Navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="mobile-nav-drawer" id="mobileNavDrawer">
    <div class="mobile-drawer-header">
        <img src="{{ asset('images/triangle-logo.svg') }}" alt="Triangle Interior Design" style="height:36px; width:auto;">
        <button class="mobile-nav-close" aria-label="Close Navigation">&times;</button>
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
        <button class="btn btn-primary open-consultation-modal" style="width:100%; border-radius:50px;">
            Book Free Consultation
        </button>
        <div class="mobile-drawer-contact">
            <div><i class="fas fa-phone-alt"></i> {{ $settings['phone_display'] ?? '01633 033 033' }}</div>
            <div><i class="fas fa-envelope"></i> {{ $settings['email'] ?? 'info.ditbd@gmail.com' }}</div>
            <div><i class="fas fa-map-marker-alt"></i> Mohakhali New DOHS, Dhaka</div>
        </div>
    </div>
</div>

<!-- Mobile Drawer Backdrop Overlay -->
<div class="mobile-nav-overlay" id="mobileNavOverlay"></div>
