@extends('layouts.app')

@section('title', 'Best Interior Design Company in Bangladesh – Triangle Interior Design')
@section('meta_description', 'Looking for the best interior design company in Bangladesh? Triangle Interior Design has delivered 500+ stunning homes in Dhaka & Chittagong. Get a free quote!')

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
                    Best Interior Design <span>Company in Bangladesh</span>
                </h1>
                <h2 style="color:#ffffff; font-size:1.85rem; font-weight:700; margin-bottom:1rem; font-family:var(--font-heading);">
                    Design your dream home <span style="color:var(--color-primary);">from scratch</span>
                </h2>
                <p class="hero-desc">
                    Specialized in complete residential and commercial interior architecture. Over 500+ bespoke homes crafted with in-house factory manufacturing in West Badda, Dhaka. 100% itemized, transparent BOQ pricing.
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
                        <div class="stat-label">Homes Handed Over</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="stat-num">{{ $settings['stats_years'] ?? '15+' }}</div>
                        <div class="stat-label">Years of Excellence</div>
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
                    <img src="{{ asset($heroImg) }}" alt="Luxury Interior by Triangle Interior Design" onerror="this.src='{{ asset('images/basabo-boys-bedroom-01-1024x768.webp') }}'">
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
     QUALITY PHILOSOPHY SECTION (Matches Reference)
     ========================================================================== -->
<section class="section-padding" style="background:#ffffff; border-bottom:1px solid var(--color-border-light);">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Our Architectural Standard</span>
            <h2 class="section-title">We Believe Quality Produces Luxury</h2>
            <p class="section-desc">
                True luxury isn't superficial decoration—it stems from robust marine substrates, precision edge-banding, flawless illumination, and spatial ergonomics.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:2rem;">
            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2.25rem; border-radius:var(--radius-md); text-align:center;">
                <div style="width:60px; height:60px; margin:0 auto 1.25rem auto; border-radius:50%; background:rgba(197,168,128,0.15); color:var(--color-primary-dark); display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                    <i class="fas fa-gem"></i>
                </div>
                <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">Premium Sourced Materials</h3>
                <p style="color:var(--color-text-muted); font-size:0.925rem; line-height:1.7;">
                    Gorjon marine plywood, high-density HDF boards, imported acrylic laminates, and German Blum/Hafele hardware ensure maximum durability.
                </p>
            </div>

            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2.25rem; border-radius:var(--radius-md); text-align:center;">
                <div style="width:60px; height:60px; margin:0 auto 1.25rem auto; border-radius:50%; background:rgba(197,168,128,0.15); color:var(--color-primary-dark); display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                    <i class="fas fa-drafting-compass"></i>
                </div>
                <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">3D Photorealistic Precision</h3>
                <p style="color:var(--color-text-muted); font-size:0.925rem; line-height:1.7;">
                    Experience your future flat with 360° photorealistic visualizations before cutting a single board. What you approve is exactly what we build.
                </p>
            </div>

            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2.25rem; border-radius:var(--radius-md); text-align:center;">
                <div style="width:60px; height:60px; margin:0 auto 1.25rem auto; border-radius:50%; background:rgba(197,168,128,0.15); color:var(--color-primary-dark); display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">Itemized BOQ & Zero Surprises</h3>
                <p style="color:var(--color-text-muted); font-size:0.925rem; line-height:1.7;">
                    Every running foot, hardware item, and surface finish is clearly priced. Zero mid-project price escalation or hidden charges.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     OUR HOME INTERIOR SERVICES (10 Services Grid)
     ========================================================================== -->
<section class="section-padding services-section" id="servicesSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Tailored Architectural & Interior Solutions</span>
            <h2 class="section-title">Our Home Interior Design Services</h2>
            <p class="section-desc">
                From complete flat interiors to custom modular kitchens and bespoke bedrooms, our in-house specialists handle every detail.
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
     PROJECT VIDEO / VIRTUAL WALKTHROUGH BANNER (Matches Reference)
     ========================================================================== -->
<section style="background:#0e1013; color:#fff; padding:5rem 0; position:relative; overflow:hidden;">
    <div class="container">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:4rem; align-items:center;">
            <div>
                <span class="section-subtitle">Virtual Walkthroughs</span>
                <h2 style="color:#ffffff; font-size:2.5rem; margin-bottom:1.25rem;">
                    See Our Interior Design Project Videos
                </h2>
                <p style="color:#94a3b8; font-size:1.1rem; line-height:1.7; margin-bottom:2rem;">
                    Watch full cinematic tours of completed flats in Gulshan, Dhanmondi, and Uttara. See the craftsmanship of our modular kitchens, walk-in closets, false ceilings, and ambient lighting in real motion.
                </p>
                <div style="display:flex; gap:1rem; flex-wrap:wrap;">
                    <a href="{{ $settings['youtube'] ?? 'https://www.youtube.com/channel/UCH_kEOE-o6hlo1X1DVermTQ' }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                        <i class="fab fa-youtube"></i> Watch on YouTube Channel
                    </a>
                    <button type="button" class="btn btn-outline-white open-consultation-modal">
                        <i class="fas fa-calendar-alt"></i> Book Live Studio Walkthrough
                    </button>
                </div>
            </div>
            <div>
                <div style="position:relative; border-radius:var(--radius-lg); overflow:hidden; border:1px solid rgba(197,168,128,0.3); box-shadow:var(--shadow-lg);">
                    <img src="{{ asset('images/basabo-boys-bedroom-04-1024x768.webp') }}" alt="Project Video Tour" style="width:100%; height:340px; object-fit:cover;">
                    <a href="{{ $settings['youtube'] ?? 'https://www.youtube.com/channel/UCH_kEOE-o6hlo1X1DVermTQ' }}" target="_blank" rel="noopener noreferrer" style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center; background:rgba(0,0,0,0.45); transition:background 0.3s;" onmouseover="this.style.background='rgba(0,0,0,0.2)'" onmouseout="this.style.background='rgba(0,0,0,0.45)'">
                        <div style="width:70px; height:70px; border-radius:50%; background:var(--color-primary); color:#0e1013; display:flex; align-items:center; justify-content:center; font-size:1.8rem; box-shadow:0 0 30px rgba(197,168,128,0.6);">
                            <i class="fas fa-play" style="margin-left:4px;"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     LATEST PROJECTS PORTFOLIO
     ========================================================================== -->
<section class="section-padding projects-section" id="projectsSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Real Completed Homes Across Bangladesh</span>
            <h2 class="section-title">Latest Home Interior Design Projects</h2>
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
     COMPANY AT A GLANCE & FACTORY SHOWCASE
     ========================================================================== -->
<section class="section-padding factory-section" id="factorySection">
    <div class="container">
        <div class="factory-grid">
            <div class="factory-content">
                <span class="section-subtitle">Triangle Interior Design at a Glance</span>
                <h2>Dedicated Manufacturing Facility in West Badda</h2>
                <p>
                    Unlike brokers who outsource carpentry to unverified street workshops, Triangle Interior Design operates a dedicated in-house manufacturing factory equipped with automated beam saws, multi-spindle boring machines, and zero-joint hot melt edge-banders.
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
     WHY 500+ HOMEOWNERS TRUST US (Matches Reference 4 Pillars)
     ========================================================================== -->
<section class="section-padding" style="background:#ffffff; border-bottom:1px solid var(--color-border-light);">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Proven Reliability</span>
            <h2 class="section-title">Why 500+ Homeowners Trust Triangle Interior Design</h2>
            <p class="section-desc">
                We combine architectural precision with in-house manufacturing to eliminate hassle, delays, and budget overruns.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:1.75rem;">
            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem 1.5rem; border-radius:var(--radius-md);">
                <div style="font-size:2rem; font-weight:800; color:var(--color-primary-dark); font-family:var(--font-heading); margin-bottom:0.75rem;">01</div>
                <h3 style="font-size:1.15rem; margin-bottom:0.5rem;">15+ Years Excellence</h3>
                <p style="color:var(--color-text-muted); font-size:0.875rem; line-height:1.6;">Established in 2011 with senior architectural leadership and 500+ handed over residences.</p>
            </div>
            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem 1.5rem; border-radius:var(--radius-md);">
                <div style="font-size:2rem; font-weight:800; color:var(--color-primary-dark); font-family:var(--font-heading); margin-bottom:0.75rem;">02</div>
                <h3 style="font-size:1.15rem; margin-bottom:0.5rem;">Clear, Itemized Pricing</h3>
                <p style="color:var(--color-text-muted); font-size:0.875rem; line-height:1.6;">Locked-in BOQ covering every cubic inch of woodwork, electrical, plumbing, and painting.</p>
            </div>
            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem 1.5rem; border-radius:var(--radius-md);">
                <div style="font-size:2rem; font-weight:800; color:var(--color-primary-dark); font-family:var(--font-heading); margin-bottom:0.75rem;">03</div>
                <h3 style="font-size:1.15rem; margin-bottom:0.5rem;">End-to-End Management</h3>
                <p style="color:var(--color-text-muted); font-size:0.875rem; line-height:1.6;">Dedicated project managers handle material procurement, site supervisor checks, and factory QA.</p>
            </div>
            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem 1.5rem; border-radius:var(--radius-md);">
                <div style="font-size:2rem; font-weight:800; color:var(--color-primary-dark); font-family:var(--font-heading); margin-bottom:0.75rem;">04</div>
                <h3 style="font-size:1.15rem; margin-bottom:0.5rem;">On-Time Handover</h3>
                <p style="color:var(--color-text-muted); font-size:0.875rem; line-height:1.6;">Guaranteed schedule with written milestone dates and official 5-year warranty certificates.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     HOW WE BRING YOUR VISION TO LIFE (The Process)
     ========================================================================== -->
<section class="section-padding why-section text-white" id="processSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Systematic Execution</span>
            <h2 class="section-title">How We Bring Your Vision to Life</h2>
            <p class="section-desc">
                A seamless 6-step journey from initial discovery conversation to key handover.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:2rem;">
            <div class="process-card">
                <div class="process-step-num">01</div>
                <h3 class="process-title">Free Initial Consultation</h3>
                <p class="process-desc">Meet our senior architects at our Mohakhali studio to discuss your family's lifestyle, room requirements, and budget framework.</p>
            </div>
            <div class="process-card">
                <div class="process-step-num">02</div>
                <h3 class="process-title">Site Survey & Space Assessment</h3>
                <p class="process-desc">Precision laser measurements, structural inspection, plumbing/electrical duct tracing, and natural lighting assessment of your flat.</p>
            </div>
            <div class="process-card">
                <div class="process-step-num">03</div>
                <h3 class="process-title">Concept & 3D Visualization</h3>
                <p class="process-desc">Detailed 2D layout planning followed by high-resolution photorealistic 3D renderings of every bedroom, kitchen, and living room.</p>
            </div>
            <div class="process-card">
                <div class="process-step-num">04</div>
                <h3 class="process-title">Final BOQ & Approval</h3>
                <p class="process-desc">Material swatch selection, hardware specifications, and sign-off on the locked-in bill of quantities (BOQ) with zero hidden items.</p>
            </div>
            <div class="process-card">
                <div class="process-step-num">05</div>
                <h3 class="process-title">Factory Build & Site Delivery</h3>
                <p class="process-desc">Joinery manufactured in our West Badda facility while on-site civil, false ceiling, and electrical works are executed simultaneously.</p>
            </div>
            <div class="process-card">
                <div class="process-step-num">06</div>
                <h3 class="process-title">Final Handover & Warranty</h3>
                <p class="process-desc">Deep cleaning, snag list resolution, and formal handover with complete hardware warranty and after-sales service guarantee.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     MATERIALS, FINISHES & QUALITY CONTROL (Matches Reference)
     ========================================================================== -->
<section class="section-padding" style="background:#f8f9fb; border-bottom:1px solid var(--color-border-light);">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Uncompromising Standards</span>
            <h2 class="section-title">Materials, Finishes & Quality Control</h2>
            <p class="section-desc">
                Every component is handpicked for tropical humidity resistance, smooth functionality, and scratch-proof longevity.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:2rem;">
            <div style="background:#ffffff; border:1px solid var(--color-border-light); border-radius:var(--radius-md); padding:2rem;">
                <div style="font-size:2rem; color:var(--color-primary-dark); margin-bottom:1rem;"><i class="fas fa-layer-group"></i></div>
                <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">Materials with Purpose</h3>
                <p style="color:var(--color-text-muted); font-size:0.925rem; line-height:1.7;">
                    Treated Gorjon core marine plywood, Action TESA moisture-resistant boards, and antibacterial quartz countertops built to withstand heavy daily Bangladeshi cooking.
                </p>
            </div>
            <div style="background:#ffffff; border:1px solid var(--color-border-light); border-radius:var(--radius-md); padding:2rem;">
                <div style="font-size:2rem; color:var(--color-primary-dark); margin-bottom:1rem;"><i class="fas fa-couch"></i></div>
                <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">Furniture That Fits</h3>
                <p style="color:var(--color-text-muted); font-size:0.925rem; line-height:1.7;">
                    Bespoke study units, walk-in closets, and modular kitchen islands designed down to the millimeter to maximize apartment floor area and eliminate dead zones.
                </p>
            </div>
            <div style="background:#ffffff; border:1px solid var(--color-border-light); border-radius:var(--radius-md); padding:2rem;">
                <div style="font-size:2rem; color:var(--color-primary-dark); margin-bottom:1rem;"><i class="fas fa-tasks"></i></div>
                <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">Details Checked</h3>
                <p style="color:var(--color-text-muted); font-size:0.925rem; line-height:1.7;">
                    Three-stage quality audits: raw board moisture testing, factory edge-banding pull tests, and on-site alignment verification before final client inspection.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SERVICE AREAS ACROSS BANGLADESH (Matches Reference)
     ========================================================================== -->
<section class="section-padding" style="background:#ffffff; border-bottom:1px solid var(--color-border-light);">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Nationwide Reach</span>
            <h2 class="section-title">Interior Design Service Areas Across Bangladesh</h2>
            <p class="section-desc">
                We design and execute luxury apartments and commercial properties across all premier neighborhoods in Dhaka and nationwide.
            </p>
        </div>

        @php
            $areas = [
                'Gulshan' => 'gulshan', 'Banani' => 'banani', 'Dhanmondi' => 'dhanmondi', 'Uttara' => 'uttara',
                'Bashundhara R/A' => 'bashundhara', 'Mirpur' => 'mirpur', 'Mohakhali' => 'mohakhali',
                'Baridhara' => 'baridhara', 'Banasree' => 'banasree', 'Aftabnagar' => 'aftabnagar',
                'Mohammadpur' => 'mohammadpur', 'Wari / Old Dhaka' => 'old-dhaka', 'Chittagong' => 'chittagong',
                'Gazipur' => 'gazipur', 'Narayanganj' => 'narayanganj'
            ];
        @endphp

        <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:0.85rem; max-width:1050px; margin:0 auto 2.5rem auto;">
            @foreach($areas as $areaLabel => $areaSlug)
                <a href="{{ route('area.landing', $areaSlug) }}" style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:0.65rem 1.4rem; border-radius:var(--radius-full); font-size:0.9rem; font-weight:600; color:var(--color-dark); transition:all 0.2s; display:inline-flex; align-items:center; gap:0.4rem;">
                    <i class="fas fa-map-pin" style="color:var(--color-primary-dark); font-size:0.75rem;"></i> {{ $areaLabel }}
                </a>
            @endforeach
        </div>

        <div style="text-align:center; background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem; border-radius:var(--radius-md); max-width:850px; margin:0 auto;">
            <h4 style="font-size:1.15rem; margin-bottom:0.5rem;">Interested in a location-specific consultation?</h4>
            <p style="color:var(--color-text-muted); font-size:0.925rem; margin-bottom:1.25rem;">Our design team can schedule a free site visit to your apartment anywhere in Dhaka.</p>
            <button type="button" class="btn btn-primary open-consultation-modal">
                <i class="fas fa-calendar-check"></i> Book Area Site Survey
            </button>
        </div>
    </div>
</section>

<!-- ==========================================================================
     TESTIMONIALS SECTION
     ========================================================================== -->
<section class="section-padding testimonials-section" id="testimonialsSection">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">What Our Customers Say About Us</span>
            <h2 class="section-title">Trusted by 500+ Discerning Families</h2>
            <p class="section-desc">
                Hear directly from Dhaka homeowners whose residences were transformed by Triangle Interior Design.
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
     CONSULTATION FORM CTA SECTION (Matches Reference)
     ========================================================================== -->
<section class="cta-section" id="consultationSection">
    <div class="container">
        <div class="cta-grid">
            <div class="cta-text">
                <span class="section-subtitle">Ready to Transform Your Home?</span>
                <h2 style="font-size:2.85rem; color:#fff; margin-bottom:1.5rem; line-height:1.2;">
                    Let Us Talk.
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
