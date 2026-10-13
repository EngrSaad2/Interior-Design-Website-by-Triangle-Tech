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
            <span style="display:inline-flex; align-items:center; gap:0.4rem;">
                <i class="fas fa-clock" style="color:var(--color-primary);"></i> Sat - Thu: 9:00 AM - 6:00 PM
            </span>
        </div>
        <div class="top-bar-right">
            <span><i class="fas fa-map-marker-alt" style="color:var(--color-primary);"></i> Mohakhali New DOHS, Dhaka</span>
            <div style="display:inline-flex; gap:0.75rem;">
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
                <img src="{{ asset('images/dit-studio-logo.webp') }}" alt="DIT Studio - Interior Specialist" style="height: 42px; width: auto; object-fit: contain;">
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
                    <!-- Projects Mega Dropdown -->
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
                        <a href="{{ route('why.choose') }}" class="nav-link">Why Choose DIT?</a>
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
                    <i class="fas fa-calendar-check"></i> Free Quote
                </button>

                <button type="button" class="mobile-toggle" aria-label="Open Navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="mobile-nav-drawer" style="position:fixed; top:0; left:0; width:300px; height:100vh; background:#0e1013; z-index:2500; transform:translateX(-100%); transition:transform 0.35s ease; padding:2rem; overflow-y:auto; border-right:1px solid rgba(197,168,128,0.2);">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:1rem;">
        <div style="font-weight:800; font-size:1.2rem; color:#fff;">DIT STUDIO</div>
        <button class="mobile-nav-close" style="background:none; border:none; color:#fff; font-size:1.5rem; cursor:pointer;">&times;</button>
    </div>
    <ul style="display:flex; flex-direction:column; gap:1.25rem;">
        <li><a href="{{ route('home') }}" style="color:#fff; font-weight:600; font-size:1.05rem;">Home</a></li>
        <li><a href="{{ route('shop') }}" style="color:#fff; font-weight:600; font-size:1.05rem;">Shop</a></li>
        <li><a href="{{ route('projects') }}" style="color:#fff; font-weight:600; font-size:1.05rem;">Projects Portfolio</a></li>
        <li><a href="{{ route('why.choose') }}" style="color:#fff; font-weight:600; font-size:1.05rem;">Why Choose DIT?</a></li>
        <li><a href="{{ route('services') }}" style="color:#fff; font-weight:600; font-size:1.05rem;">Our Services</a></li>
        <li><a href="{{ route('blogs') }}" style="color:#fff; font-weight:600; font-size:1.05rem;">Blogs & Guides</a></li>
        <li><a href="{{ route('faqs') }}" style="color:#fff; font-weight:600; font-size:1.05rem;">FAQs</a></li>
        <li><a href="{{ route('contact') }}" style="color:#fff; font-weight:600; font-size:1.05rem;">Contact Us</a></li>
    </ul>
    <div style="margin-top:2.5rem; border-top:1px solid rgba(255,255,255,0.1); padding-top:1.5rem;">
        <button class="btn btn-primary open-consultation-modal" style="width:100%; border-radius:50px;">
            Book Free Consultation
        </button>
        <div style="margin-top:1.5rem; color:#94a3b8; font-size:0.85rem; line-height:1.6;">
            <div><i class="fas fa-phone-alt" style="color:var(--color-primary); margin-right:0.4rem;"></i> {{ $settings['phone'] ?? '+8801633033033' }}</div>
            <div style="margin-top:0.5rem;"><i class="fas fa-envelope" style="color:var(--color-primary); margin-right:0.4rem;"></i> {{ $settings['email'] ?? 'info.ditbd@gmail.com' }}</div>
        </div>
    </div>
</div>

<style>
.mobile-nav-drawer.open {
    transform: translateX(0) !important;
}
</style>
