@extends('layouts.app')

@section('title', 'Best Interior Design Company in Bangladesh – DIT Studio')
@section('meta_description', 'Looking for the best interior design company in Bangladesh? DIT Studio has delivered 500+ stunning homes in Dhaka & Chittagong. Get a free quote!')

@section('content')
<!-- ==========================================================================
     HERO SECTION
     ========================================================================== -->
<section class="hero-section" id="heroSection">
    <div class="container">
        <div class="hero-grid">
            <!-- Hero Content -->
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-certificate" style="color:var(--color-primary);"></i>
                    <span>Bangladesh's Leading Turnkey Interior Firm Since 2011</span>
                </div>
                <h1 class="hero-title">
                    Transforming Spaces Into <span>Timeless Masterpieces</span>
                </h1>
                <p class="hero-desc">
                    Over 500+ premium residential and commercial spaces designed and crafted with in-house factory manufacturing in West Badda, Dhaka. Complete peace of mind with 100% transparent itemized BOQ.
                </p>
                <div class="hero-btns">
                    <button type="button" class="btn btn-primary open-consultation-modal" id="heroConsultBtn">
                        <i class="fas fa-file-invoice-dollar"></i> Get Free Estimate & 3D Consultation
                    </button>
                    <a href="{{ route('projects') }}" class="btn btn-outline-white" id="heroProjectsBtn">
                        <i class="fas fa-images"></i> Explore 500+ Projects
                    </a>
                </div>

                <!-- Live Counter Stats -->
                <div class="hero-stats">
                    <div class="hero-stat-item">
                        <div class="stat-num">{{ $settings['stats_projects'] ?? '500+' }}</div>
                        <div class="stat-label">Projects Completed</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="stat-num">{{ $settings['stats_years'] ?? '14+' }}</div>
                        <div class="stat-label">Years of Experience</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="stat-num">{{ $settings['stats_team'] ?? '50+' }}</div>
                        <div class="stat-label">Master Craftsmen</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="stat-num">{{ $settings['stats_satisfaction'] ?? '100%' }}</div>
                        <div class="stat-label">Client Satisfaction</div>
                    </div>
                </div>
            </div>

            <!-- Hero Visual Showcase -->
            <div class="hero-visual">
                <div class="hero-main-img-card">
                    @php
                        $heroImg = 'images/luxury-master-bedroom-design-gulshan-2-3000-sqft-featured.webp';
                        if (!file_exists(public_path($heroImg))) {
                            $heroImg = 'images/modern-living-room-design-uttara-sector-6-1600-sqft-featured.webp';
                        }
                    @endphp
                    <img src="{{ asset($heroImg) }}" alt="Luxury Interior by DIT Studio" onerror="this.src='{{ asset('images/basabo-boys-bedroom-01-1024x768.webp') }}'">
                </div>
                <div class="hero-floating-card">
                    <div class="icon-box">
                        <i class="fas fa-industry"></i>
                    </div>
                    <div class="card-text">
                        <h5>In-House Factory</h5>
                        <p>West Badda, Dhaka — zero middleman markup & precision joinery.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     OUR SERVICES SECTION
     ========================================================================== -->
<section class="section-padding services-section" id="servicesSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Tailored Architectural & Interior Solutions</span>
            <h2 class="section-title">Our Comprehensive Services</h2>
            <p class="section-desc">
                From initial 3D visualization to custom factory joinery and final styling, we manage every detail under one roof.
            </p>
        </div>

        <div class="services-grid">
            @foreach($services as $service)
                <div class="service-card">
                    <div class="service-card-img">
                        <img src="{{ asset($service->featured_image) }}" alt="{{ $service->title }}" onerror="this.src='{{ asset('images/basabo-common-area-01-1024x768.webp') }}'">
                        <span class="service-card-badge">Full Turnkey</span>
                    </div>
                    <div class="service-card-body">
                        <div class="service-icon-box">
                            <i class="fas {{ $service->icon ?: 'fa-pencil-ruler' }}"></i>
                        </div>
                        <h3 class="service-card-title">
                            <a href="{{ route('service.detail', $service->slug) }}">{{ $service->title }}</a>
                        </h3>
                        <p class="service-card-text">
                            {{ Str::limit($service->excerpt ?: $service->description, 130) }}
                        </p>
                        <a href="{{ route('service.detail', $service->slug) }}" class="service-card-link">
                            Explore Service <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 3.5rem;">
            <a href="{{ route('services') }}" class="btn btn-dark">
                View All 10 Design Services <i class="fas fa-chevron-right" style="font-size:0.8rem;"></i>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================================================
     WHY CHOOSE DIT & 8-STEP PROCESS
     ========================================================================== -->
<section class="section-padding why-section text-white" id="whyChooseSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Guaranteed Quality & Punctuality</span>
            <h2 class="section-title">The DIT Studio 8-Step Process</h2>
            <p class="section-desc">
                A structured, transparent methodology ensuring flawless execution from first consultation to final key handover.
            </p>
        </div>

        <div class="process-grid">
            @php
                $steps = [
                    ['num' => '01', 'title' => 'Initial Consultation', 'desc' => 'Lifestyle analysis, space evaluation, ergonomic needs & preliminary budget mapping.'],
                    ['num' => '02', 'title' => '2D Space Planning', 'desc' => 'Precision layout drafting with architectural traffic flow and optimal functional zoning.'],
                    ['num' => '03', 'title' => 'Photorealistic 3D Renders', 'desc' => 'High-definition 360° visualizations of exact lighting, finishes, textures, and cabinetry.'],
                    ['num' => '04', 'title' => 'Itemized Transparent BOQ', 'desc' => 'Crystal-clear line-by-line cost estimation with zero hidden fees or unexpected extras.'],
                    ['num' => '05', 'title' => 'In-House Factory Build', 'desc' => 'Crafted at our West Badda factory using German edge-banding & European hardware.'],
                    ['num' => '06', 'title' => 'On-Site Execution', 'desc' => 'Supervised civil, false ceiling, sanitary, electrical, and surface finishing work.'],
                    ['num' => '07', 'title' => 'Styling & Detailing', 'desc' => 'Curation of illumination, soft furnishings, wall art, and professional deep sanitization.'],
                    ['num' => '08', 'title' => 'Punctual Handover', 'desc' => 'Formal on-schedule handover backed by official warranty certificates & post-care support.']
                ];
            @endphp

            @foreach($steps as $s)
                <div class="process-card">
                    <div class="process-step-num">{{ $s['num'] }}</div>
                    <h3 class="process-title">{{ $s['title'] }}</h3>
                    <p class="process-desc">{{ $s['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- 3 Core Advantages -->
        <div class="advantages-grid">
            <div class="advantage-item">
                <div class="advantage-icon"><i class="fas fa-warehouse"></i></div>
                <div class="advantage-text">
                    <h4>In-House Factory Facility</h4>
                    <p>Located in West Badda, giving us 100% control over joinery finish, marine plywood durability, and delivery schedules.</p>
                </div>
            </div>
            <div class="advantage-item">
                <div class="advantage-icon"><i class="fas fa-receipt"></i></div>
                <div class="advantage-text">
                    <h4>No Hidden Costs</h4>
                    <p>We provide a locked-in Bill of Quantities (BOQ). What we quote is what you pay—no surprise price revisions during work.</p>
                </div>
            </div>
            <div class="advantage-item">
                <div class="advantage-icon"><i class="fas fa-shield-alt"></i></div>
                <div class="advantage-text">
                    <h4>Comprehensive Warranty</h4>
                    <p>Full warranty coverage on hardware, edge-banding, and structural cabinetry, backed by dedicated after-sales technicians.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     FEATURED PORTFOLIO PROJECTS
     ========================================================================== -->
<section class="section-padding projects-section" id="projectsSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Real Completed Homes Across Bangladesh</span>
            <h2 class="section-title">Featured Project Portfolio</h2>
            <p class="section-desc">
                Explore our recent transformations in Gulshan, Banani, Uttara, Bashundhara, Dhanmondi, and beyond.
            </p>
        </div>

        <div class="filter-nav">
            <a href="{{ route('projects') }}" class="filter-btn active">All Projects</a>
            <a href="{{ route('project.hub', 'bedroom-interior-design-projects-bangladesh') }}" class="filter-btn">Bedrooms</a>
            <a href="{{ route('project.hub', 'modular-kitchen-projects-bangladesh') }}" class="filter-btn">Kitchens</a>
            <a href="{{ route('project.hub', 'living-room-interior-design-projects-bangladesh') }}" class="filter-btn">Living Rooms</a>
            <a href="{{ route('project.hub', 'closet-design-projects-bangladesh') }}" class="filter-btn">Luxury Closets</a>
            <a href="{{ route('project.hub', 'luxury-interior-design-projects') }}" class="filter-btn">Luxury Interiors</a>
        </div>

        <div class="projects-grid">
            @foreach($featuredProjects as $project)
                <div class="project-card">
                    <div class="project-card-thumb">
                        <img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}" onerror="this.src='{{ asset('images/basabo-boys-bedroom-02-1024x768.webp') }}'">
                        <span class="project-card-category">{{ $project->category ?? 'Interior Design' }}</span>
                        <div class="project-card-overlay">
                            <a href="{{ route('project.detail', $project->slug) }}" class="btn btn-primary" style="padding:0.5rem 1.25rem; font-size:0.85rem;">
                                View Project Details
                            </a>
                        </div>
                    </div>
                    <div class="project-card-body">
                        <div class="project-card-location">
                            <i class="fas fa-map-marker-alt" style="color:var(--color-primary-dark);"></i>
                            {{ $project->location ?? 'Dhaka, Bangladesh' }}
                        </div>
                        <h3 class="project-card-title">
                            <a href="{{ route('project.detail', $project->slug) }}">{{ $project->title }}</a>
                        </h3>
                        <div class="project-card-meta">
                            <span><i class="fas fa-vector-square"></i> {{ $project->area_sqft ?? '2,200 sq ft' }}</span>
                            <span><i class="fas fa-calendar-alt"></i> {{ $project->completion_year ?? '2025' }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 3.5rem;">
            <a href="{{ route('projects') }}" class="btn btn-primary" style="padding: 1rem 2.5rem; font-size: 1rem;">
                Browse Complete 500+ Project Portfolio <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================================================
     IN-HOUSE FACTORY & MANUFACTURING SECTION
     ========================================================================== -->
<section class="section-padding factory-section" id="factorySection">
    <div class="container">
        <div class="factory-grid">
            <div class="factory-content">
                <span class="section-subtitle">Factory Direct Precision</span>
                <h2>Dedicated Manufacturing Facility in West Badda</h2>
                <p>
                    Unlike brokers who outsource carpentry to random street workshops, DIT Studio operates a full-scale in-house manufacturing factory equipped with automated beam saws, multi-spindle boring machines, and zero-joint hot melt edge-banders.
                </p>
                <div class="factory-points">
                    <div class="factory-point-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Imported Marine & HDF Board Processing</span>
                    </div>
                    <div class="factory-point-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Blum & Hafele German Hardware Fittings</span>
                    </div>
                    <div class="factory-point-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Dust-Free PU Lacquer & Acrylic Spray Booth</span>
                    </div>
                    <div class="factory-point-item">
                        <i class="fas fa-check-circle"></i>
                        <span>30% Faster Delivery with Strict Milestones</span>
                    </div>
                </div>
                <div style="margin-top: 2rem;">
                    <button type="button" class="btn btn-primary open-consultation-modal">
                        <i class="fas fa-calendar-alt"></i> Book Factory & Studio Visit
                    </button>
                </div>
            </div>

            <div class="factory-gallery">
                <img src="{{ asset('images/basabo-boys-bedroom-03-1024x768.webp') }}" alt="Factory Craftsmanship 1">
                <img src="{{ asset('images/basabo-common-area-02-1024x768.webp') }}" alt="Factory Craftsmanship 2">
                <img src="{{ asset('images/basabo-boys-bedroom-04-1024x768.webp') }}" alt="Factory Craftsmanship 3">
                <img src="{{ asset('images/basabo-boys-bedroom-05-1024x768.webp') }}" alt="Factory Craftsmanship 4">
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     CUSTOM FURNITURE SHOP PREVIEW
     ========================================================================== -->
@if($products->isNotEmpty())
<section class="section-padding shop-section" id="shopSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Handcrafted Studio Pieces</span>
            <h2 class="section-title">Custom Furniture Collection</h2>
            <p class="section-desc">
                Architectural custom furniture built specifically for your layout and dimensions.
            </p>
        </div>

        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-card-thumb">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" onerror="this.src='{{ asset('images/Aella90-300x300.webp') }}'">
                    </div>
                    <div class="product-card-body">
                        <h4 class="product-card-title">
                            <a href="{{ route('product.detail', $product->slug) }}">{{ $product->title }}</a>
                        </h4>
                        <div class="product-card-price">{{ $product->price_text ?? ('৳ ' . number_format($product->price)) }}</div>
                        <button type="button" class="btn btn-dark btn-add-to-cart" style="width:100%; padding:0.6rem; font-size:0.875rem;"
                                data-id="{{ $product->id }}"
                                data-title="{{ $product->title }}"
                                data-price="{{ $product->price }}"
                                data-image="{{ asset($product->image) }}">
                            <i class="fas fa-shopping-bag"></i> Add to Cart
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <a href="{{ route('shop') }}" class="btn btn-outline-white" style="color:var(--color-dark); border-color:var(--color-border-light);">
                Visit Furniture Store <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- ==========================================================================
     TESTIMONIALS SECTION
     ========================================================================== -->
<section class="section-padding testimonials-section" id="testimonialsSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">What Our Clients Say</span>
            <h2 class="section-title">Trusted by 500+ Discerning Families</h2>
            <p class="section-desc">
                Hear directly from Dhaka homeowners whose residences were transformed by DIT Studio.
            </p>
        </div>

        <div class="testimonials-grid">
            @foreach($testimonials as $t)
                <div class="testimonial-card">
                    <div>
                        <div class="testimonial-stars">
                            @for($i = 0; $i < $t->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <p class="testimonial-text">
                            "{{ $t->comment }}"
                        </p>
                    </div>
                    <div class="testimonial-client">
                        <div class="testimonial-avatar">
                            {{ substr($t->client_name, 0, 1) }}
                        </div>
                        <div class="testimonial-info">
                            <h5>{{ $t->client_name }}</h5>
                            <p>{{ $t->client_title ?? $t->location }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================================================
     LATEST BLOGS & GUIDES
     ========================================================================== -->
<section class="section-padding blogs-section" id="blogsSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Architectural Insights & Design Tips</span>
            <h2 class="section-title">Latest Interior Advice</h2>
            <p class="section-desc">
                Expert advice on apartment renovation, modular kitchen ergonomics, lighting, and budgeting in Dhaka.
            </p>
        </div>

        <div class="blogs-grid">
            @foreach($blogs as $blog)
                <div class="blog-card">
                    <div class="blog-card-thumb">
                        <img src="{{ asset($blog->cover_image) }}" alt="{{ $blog->title }}" onerror="this.src='{{ asset('images/basabo-boys-bedroom-06-1024x768.webp') }}'">
                    </div>
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <span><i class="fas fa-calendar-alt"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Nov 2025' }}</span>
                            <span><i class="fas fa-clock"></i> {{ $blog->reading_time }}</span>
                        </div>
                        <h3 class="blog-card-title">
                            <a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                        </h3>
                        <p class="blog-card-excerpt">
                            {{ Str::limit($blog->excerpt ?: $blog->content, 110) }}
                        </p>
                        <a href="{{ route('blog.detail', $blog->slug) }}" style="font-weight:700; font-size:0.875rem; color:var(--color-primary-dark); display:inline-flex; align-items:center; gap:0.4rem;">
                            Read Full Guide <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 3.5rem;">
            <a href="{{ route('blogs') }}" class="btn btn-dark">
                View All Design Articles <i class="fas fa-chevron-right" style="font-size:0.8rem;"></i>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================================================
     FREQUENTLY ASKED QUESTIONS (FAQS)
     ========================================================================== -->
<section class="section-padding faq-section" id="faqSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Everything You Need To Know</span>
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-desc">
                Clear answers regarding cost estimations, construction timelines, materials, and consultation bookings.
            </p>
        </div>

        <div class="faq-container">
            @foreach($faqs as $idx => $faq)
                <div class="faq-item {{ $idx === 0 ? 'active' : '' }}">
                    <div class="faq-question">
                        <span>{{ $faq->question }}</span>
                        <i class="fas fa-chevron-down faq-toggle-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 2.5rem;">
            <a href="{{ route('faqs') }}" class="btn btn-dark">
                View All 38 FAQs <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================================================
     FREE CONSULTATION CTA SECTION & FORM
     ========================================================================== -->
<section class="cta-section" id="consultationSection">
    <div class="container">
        <div class="cta-grid">
            <div class="cta-text">
                <span class="section-subtitle">Ready To Elevate Your Lifestyle?</span>
                <h2 style="font-size:2.85rem; color:#fff; margin-bottom:1.5rem; line-height:1.2;">
                    Let’s Design Your Dream Home Today
                </h2>
                <p style="color:#94a3b8; font-size:1.1rem; line-height:1.7; margin-bottom:2rem;">
                    Schedule a private design consultation at our Mohakhali New DOHS studio or book a site visit. Receive custom 2D layout planning and an itemized BOQ estimate with no commitment required.
                </p>
                <div style="display:flex; flex-direction:column; gap:1rem; margin-bottom:2rem;">
                    <div style="display:flex; align-items:center; gap:0.75rem; color:#e2e8f0;">
                        <i class="fas fa-phone-alt" style="color:var(--color-primary); font-size:1.25rem;"></i>
                        <span style="font-size:1.1rem; font-weight:700;">Direct Hotline: <a href="tel:{{ $settings['phone'] ?? '+8801633033033' }}" style="color:var(--color-primary);">{{ $settings['phone_display'] ?? '01633 033 033' }}</a></span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.75rem; color:#e2e8f0;">
                        <i class="fas fa-map-marker-alt" style="color:var(--color-primary); font-size:1.25rem;"></i>
                        <span>House 127 (2nd floor), Road 05, Mohakhali New DOHS, Dhaka 1206</span>
                    </div>
                </div>
            </div>

            <div class="cta-form-card">
                <h3 style="color:#ffffff; font-size:1.6rem; margin-bottom:0.5rem; font-family:var(--font-heading);">
                    Request A Free Estimate
                </h3>
                <p style="color:#94a3b8; font-size:0.875rem; margin-bottom:1.75rem;">
                    Fill out the form below. An interior architect will contact you within 2 hours.
                </p>

                <form action="{{ route('inquiry.submit') }}" method="POST" id="ctaLeadForm">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="cta_name">Full Name *</label>
                        <input type="text" name="name" id="cta_name" class="form-control" placeholder="e.g. Shakil Chowdhury" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cta_phone">Phone Number *</label>
                        <input type="tel" name="phone" id="cta_phone" class="form-control" placeholder="e.g. +88017XXXXXXXX" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cta_location">Project Location</label>
                        <input type="text" name="location" id="cta_location" class="form-control" placeholder="e.g. Banani, Dhaka">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cta_sqft">Estimated Area (Sq Ft)</label>
                        <input type="text" name="estimated_sqft" id="cta_sqft" class="form-control" placeholder="e.g. 2,400 sq ft">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cta_service">Interior Scope</label>
                        <select name="service_type" id="cta_service" class="form-control">
                            <option value="Complete Home Interior">Complete Home Interior</option>
                            <option value="Modular Kitchen Design">Modular Kitchen Design</option>
                            <option value="Bedroom Design">Bedroom Design</option>
                            <option value="Living & Dining Space">Living & Dining Space</option>
                            <option value="Commercial / Office">Commercial / Office</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cta_message">Your Vision / Notes</label>
                        <textarea name="message" id="cta_message" class="form-control" rows="3" placeholder="Tell us about your requirements..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%; border-radius:var(--radius-sm); font-size:1rem; padding:0.95rem;">
                        <i class="fas fa-paper-plane"></i> Get Consultation & Free BOQ
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
