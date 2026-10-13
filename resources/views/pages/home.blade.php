@extends('layouts.app')

@section('title', 'Interior Design Website – Best Interior Design Company in Bangladesh | Triangle Interior Design')
@section('meta_description', 'Looking for the best Interior Design Website in Bangladesh? Triangle Interior Design offers luxury turnkey home and commercial interiors with factory-backed precision. Call +8801810536303 for free consultation!')
@section('meta_keywords', 'Interior Design Website, best interior design website, modern interior design website, luxury interior design website, interior design website bangladesh, interior design company dhaka, best interior designer, modular kitchen bangladesh, duplex interior design dhaka, triangle interior design')

@push('scripts')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "What is the typical cost of interior design per sqft in Bangladesh?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Interior design costs in Bangladesh generally range from ৳1,200 to ৳3,500+ per square foot depending on the scope. A basic turnkey fit-out starts around ৳1,200–৳1,800/sqft, while luxury turnkey solutions range between ৳2,200–৳3,500/sqft. Triangle Interior Design provides 100% itemized BOQ quotes after site measurement."
      }
    },
    {
      "@@type": "Question",
      "name": "How long does a full home interior project take to complete?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "For a standard 1,800–2,500 sqft apartment, complete handover typically takes 45 to 60 working days from 3D approval. Because 80% of our cabinetry and furniture is prefabricated in our East Badda factory, on-site noise and disturbance are minimized."
      }
    },
    {
      "@@type": "Question",
      "name": "Can I visit your furniture manufacturing factory before signing?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Yes! We encourage clients to visit both our design studio in Mohakhali New DOHS and our factory in East Badda, Dhaka. You can inspect raw materials, edge-banding machines, and live joinery work before making a commitment."
      }
    },
    {
      "@@type": "Question",
      "name": "What materials and hardware brands do you use?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "We use BWR/BWP grade Gorjan marine plywood, Malaysian engineered boards, Merino/Greenlam high-pressure laminates, and genuine German Blum, Hafele, or FGV soft-closing hardware to ensure decades of moisture-resistant durability."
      }
    },
    {
      "@@type": "Question",
      "name": "How can I schedule a consultation or site survey?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "You can call our direct hotline at +8801810536303, message us on WhatsApp (+8801810536303), or click the Get Free Consultation button. Our senior architects will coordinate a free visit."
      }
    }
  ]
}
</script>
@endpush

@section('content')
<!-- ==========================================================================
     HERO SECTION (Matches ditstudio.com.bd dit-hero slider exactly)
     ========================================================================== -->
<section class="dit-hero" id="ditHero" data-autoplay="5000" aria-label="Slides" aria-roledescription="carousel" style="--dit-overlay-strength: 0.75;">
    <div class="dit-hero__viewport">
        @forelse($sliders as $index => $slide)
            <div class="dit-hero__slide {{ $index === 0 ? 'is-active' : '' }}" role="group" aria-roledescription="slide" aria-hidden="{{ $index === 0 ? 'false' : 'true' }}" id="heroSlide{{ $slide->id }}">
                <div class="dit-hero__bg" role="img" aria-label="{{ $slide->title ?? 'Interior Slide' }}" style="background-image:url('{{ asset($slide->image) }}');"></div>
                <div class="dit-hero__inner">
                    <div class="dit-hero__contents">
                        <h1 class="dit-hero__heading">
                            @if(!empty($slide->highlight_word) && str_contains($slide->title, $slide->highlight_word))
                                {!! str_replace($slide->highlight_word, '<span class="highlight">' . e($slide->highlight_word) . '</span>', e($slide->title)) !!}
                            @else
                                {{ $slide->title }}
                            @endif
                        </h1>
                        @if(!empty($slide->subtitle))
                            <p class="dit-hero__desc">
                                {{ $slide->subtitle }}
                            </p>
                        @endif
                        <div class="dit-hero__actions">
                            <button type="button" class="dit-hero__cta open-consultation-modal">
                                {{ !empty($slide->button_text) ? $slide->button_text : 'Get Free Consultation' }}
                            </button>
                            <a class="dit-hero__catalogue open-consultation-modal" href="{{ !empty($slide->catalogue_url) ? $slide->catalogue_url : '#consultation' }}" title="Portfolio Download Now">
                                <img alt="Download Portfolio E-Catalogue" src="{{ asset('images/btn-down.webp') }}" onerror="this.style.display='none'">
                                <span class="catalogue-fallback-text"><i class="fas fa-download"></i> Portfolio Download Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="dit-hero__slide is-active" role="group" aria-roledescription="slide" aria-hidden="false" id="heroSlideDefault">
                <div class="dit-hero__bg" role="img" aria-label="Luxury Interior" style="background-image:url('{{ asset('images/banner-1.webp') }}');"></div>
                <div class="dit-hero__inner">
                    <div class="dit-hero__contents">
                        <h1 class="dit-hero__heading">
                            We Believe<br><span class="highlight">Quality</span> Produces <span class="highlight">Luxury</span>
                        </h1>
                        <p class="dit-hero__desc">
                            At Triangle Interior Design, Quality Produces Luxury. It begins with thoughtful proportions, well-chosen materials, and precise finishes.
                        </p>
                        <div class="dit-hero__actions">
                            <button type="button" class="dit-hero__cta open-consultation-modal">
                                Get Free Consultation
                            </button>
                            <a class="dit-hero__catalogue open-consultation-modal" href="#consultation" title="Portfolio Download Now">
                                <img alt="Download Portfolio E-Catalogue" src="{{ asset('images/btn-down.webp') }}" onerror="this.style.display='none'">
                                <span class="catalogue-fallback-text"><i class="fas fa-download"></i> Portfolio Download Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Hero Social Media Circular Icons (Facebook, LinkedIn, YouTube, Messenger, Pinterest, WhatsApp) -->
    <div class="dit-hero__social">
        <ul class="dit-hero__social-list">
            <li>
                <a aria-label="Facebook" class="dit-hero__social-icon dit-hero__social-icon--facebook" href="{{ $settings['facebook'] ?? 'https://www.facebook.com/dit.interior/' }}" rel="noopener noreferrer" target="_blank">
                    <svg viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                </a>
            </li>
            <li>
                <a aria-label="Linkedin" class="dit-hero__social-icon dit-hero__social-icon--linkedin" href="{{ $settings['linkedin'] ?? 'https://www.linkedin.com/company/ditstudio/' }}" rel="noopener noreferrer" target="_blank">
                    <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
                </a>
            </li>
            <li>
                <a aria-label="Youtube" class="dit-hero__social-icon dit-hero__social-icon--youtube" href="{{ $settings['youtube'] ?? 'https://www.youtube.com/@ditstudiobd' }}" rel="noopener noreferrer" target="_blank">
                    <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
                </a>
            </li>
            <li>
                <a aria-label="Messenger" class="dit-hero__social-icon dit-hero__social-icon--messenger" href="http://m.me/1708620392699885" rel="noopener noreferrer" target="_blank">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256.55 8C116.52 8 8 110.34 8 248.57c0 72.3 29.71 134.78 78.07 177.94 8.35 7.51 6.63 11.86 8.05 58.23A19.92 19.92 0 0 0 122 502.31c52.91-23.3 53.59-25.14 62.56-22.7C337.85 521.8 504 423.7 504 248.57 504 110.34 396.59 8 256.55 8zm149.24 185.13l-73 115.57a37.37 37.37 0 0 1-53.91 9.93l-58.08-43.47a15 15 0 0 0-18 0l-78.37 59.44c-10.46 7.93-24.16-4.6-17.11-15.67l73-115.57a37.36 37.36 0 0 1 53.91-9.93l58.06 43.46a15 15 0 0 0 18 0l78.41-59.38c10.44-7.98 24.14 4.54 17.09 15.62z"></path></svg>
                </a>
            </li>
            <li>
                <a aria-label="Pinterest" class="dit-hero__social-icon dit-hero__social-icon--pinterest" href="{{ $settings['pinterest'] ?? 'https://www.pinterest.com/ditstudiobd/' }}" rel="noopener noreferrer" target="_blank">
                    <svg viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"></path></svg>
                </a>
            </li>
            <li>
                <a aria-label="Whatsapp" class="dit-hero__social-icon dit-hero__social-icon--whatsapp" href="https://wa.me/8801810536303" rel="noopener noreferrer" target="_blank">
                    <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg>
                </a>
            </li>
        </ul>
    </div>
</section>

<!-- ==========================================================================
     OUR HOME INTERIOR DESIGN SERVICES (Matches ditstudio nested carousel)
     ========================================================================== -->
<section class="services-carousel-section" id="servicesSection">
    <div class="container-fluid-carousel">
        <div class="section-title-wrap">
            <h2 class="services-main-heading">OUR HOME INTERIOR DESIGN SERVICES</h2>
        </div>

        <div class="services-carousel-wrapper">
            <!-- Carousel Navigation Arrows -->
            <button type="button" class="carousel-arrow carousel-arrow-prev" id="servicesPrevBtn" aria-label="Previous Services">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button type="button" class="carousel-arrow carousel-arrow-next" id="servicesNextBtn" aria-label="Next Services">
                <i class="fas fa-chevron-right"></i>
            </button>

            <!-- Carousel Track -->
            <div class="services-carousel-track" id="servicesCarouselTrack">
                <!-- Card 1: Home Interior Design -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'home-interior-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/home-interior-design-service.webp') }}" alt="Home Interior Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Home Interior Design</h3>
                    </a>
                </div>

                <!-- Card 2: Traditional Kitchen -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'traditional-kitchen-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/traditional-kitchen-carosel.jpg') }}" alt="Traditional Kitchen Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Traditional Kitchen</h3>
                    </a>
                </div>

                <!-- Card 3: Landscape Design -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'landscape-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/landscape-design-carousel.jpg') }}" alt="Landscape Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Landscape Design</h3>
                    </a>
                </div>

                <!-- Card 4: Bathroom Design -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'bathroom-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/bathroom-design-service.webp') }}" alt="Bathroom Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Bathroom Design</h3>
                    </a>
                </div>

                <!-- Card 5: Modular Kitchen Design -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'modular-kitchen-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/modular-kitchen-design-service.webp') }}" alt="Modular Kitchen Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Modular Kitchen Design</h3>
                    </a>
                </div>

                <!-- Card 6: Open Kitchen Design -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'open-kitchen-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/open-kitchen-design-carousel.jpg') }}" alt="Open Kitchen Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Open Kitchen Design</h3>
                    </a>
                </div>

                <!-- Card 7: Living Room Design -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'living-room-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/living-room-design-service.webp') }}" alt="Living Room Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Living Room Design</h3>
                    </a>
                </div>

                <!-- Card 8: Common Space Design -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'common-space-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/common-space-design-service.webp') }}" alt="Common Space Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Common Space Design</h3>
                    </a>
                </div>

                <!-- Card 9: Bedroom Design -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'bedroom-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/bedroom-design-service.webp') }}" alt="Bedroom Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Bedroom Design</h3>
                    </a>
                </div>

                <!-- Card 10: Custom Furniture Design -->
                <div class="service-slide-card">
                    <a href="{{ route('service.detail', 'custom-furniture-design') }}" class="service-card-inner">
                        <div class="service-card-img-wrap">
                            <img src="{{ asset('images/custom_furniture_carousel.jpg') }}" alt="Custom Furniture Design" loading="lazy">
                        </div>
                        <div class="service-card-gradient"></div>
                        <h3 class="service-card-title">Custom Furniture Design</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     WHAT OUR CUSTOMERS SAY ABOUT US (Testimonials Section)
     ========================================================================== -->
<section class="section-padding bg-light" id="testimonialsSection">
    <div class="container">
        <div class="section-title-wrap text-center">
            <h2 class="services-main-heading">WHAT OUR CUSTOMERS SAY ABOUT US</h2>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-quote">
                    "Triangle Interior Design executed our 3,200 sqft duplex in Gulshan 2 with incredible finesse. Their West Badda factory manufactured flawless marine plywood wardrobes and a modular kitchen that still looks brand new."
                </p>
                <div class="testimonial-client">
                    <img src="{{ asset('images/Hasan-Imam-150x150.jpg') }}" alt="Syed Hasan Imam" class="client-avatar" onerror="this.src='{{ asset('images/clients.jpg') }}'">
                    <div class="client-info">
                        <h5>Syed Hasan Imam</h5>
                        <span>Gulshan 2, Dhaka • Duplex Residence</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-quote">
                    "From the initial 3D design to handover, the transparency in their BOQ pricing was refreshing. No hidden costs. Punctual delivery and respectful project supervisors on-site."
                </p>
                <div class="testimonial-client">
                    <img src="{{ asset('images/Shofiul-Islam-150x150.jpg') }}" alt="Dr. Shofiul Islam" class="client-avatar" onerror="this.src='{{ asset('images/clients2.jpg') }}'">
                    <div class="client-info">
                        <h5>Dr. Shofiul Islam</h5>
                        <span>Uttara Sector 6, Dhaka • 2,400 sqft Flat</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-quote">
                    "The custom furniture finish was extraordinary. The PU lacquer coat and Hafele fittings they recommended gave our living and dining space a five-star hotel atmosphere."
                </p>
                <div class="testimonial-client">
                    <img src="{{ asset('images/Sulayman-150x150.jpg') }}" alt="Sulayman Chowdhury" class="client-avatar" onerror="this.src='{{ asset('images/clients3.jpg') }}'">
                    <div class="client-info">
                        <h5>Sulayman Chowdhury</h5>
                        <span>Bashundhara R/A (Block I) • Full Interior</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SEE OUR INTERIOR DESIGN PROJECT VIDEOS
     ========================================================================== -->
<section class="section-padding" style="background:#ffffff;" id="videosSection">
    <div class="container">
        <div class="section-title-wrap text-center">
            <h2 class="services-main-heading">SEE OUR INTERIOR DESIGN PROJECT VIDEOS</h2>
        </div>

        <div class="videos-grid">
            <div class="video-card">
                <div class="video-thumbnail-wrap">
                    <img src="{{ asset('images/project-video-thumbnail-1.webp') }}" alt="Gulshan 2 Luxury Apartment Walkthrough" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                    <a href="https://www.youtube.com/@ditstudiobd" target="_blank" rel="noopener noreferrer" class="video-play-btn" aria-label="Play Video">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
                <div class="video-meta">
                    <h4>3000 Sqft Luxury Duplex Walkthrough – Gulshan 2</h4>
                    <p>Complete turnkey architecture, automated lighting & Italian marble finishes.</p>
                </div>
            </div>

            <div class="video-card">
                <div class="video-thumbnail-wrap">
                    <img src="{{ asset('images/project-video-thumbnail-2.webp') }}" alt="Uttara Sector 6 Modern Apartment Walkthrough" onerror="this.src='{{ asset('images/banner-2.webp') }}'">
                    <a href="https://www.youtube.com/@ditstudiobd" target="_blank" rel="noopener noreferrer" class="video-play-btn" aria-label="Play Video">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
                <div class="video-meta">
                    <h4>2400 Sqft Modern Living & Modular Kitchen – Uttara</h4>
                    <p>High-gloss acrylic cabinetry, hidden pantry and concealed ambient illumination.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     LATEST HOME INTERIOR DESIGN PROJECTS (Portfolio Grid)
     ========================================================================== -->
<section class="section-padding bg-light" id="projectsSection">
    <div class="container">
        <div class="section-title-wrap text-center">
            <h2 class="services-main-heading">LATEST HOME INTERIOR DESIGN PROJECTS</h2>
        </div>

        <!-- Filter tabs -->
        <div class="project-filter-tabs">
            <button class="filter-btn active" data-filter="all">All Projects</button>
            <button class="filter-btn" data-filter="bedroom">Bedrooms</button>
            <button class="filter-btn" data-filter="kitchen">Kitchens</button>
            <button class="filter-btn" data-filter="living">Living Rooms</button>
            <button class="filter-btn" data-filter="dining">Dining & Common</button>
        </div>

        <div class="projects-grid">
            <!-- Project 1 -->
            <div class="project-item-card" data-category="bedroom">
                <div class="project-img-box">
                    <img src="{{ asset('images/luxury-master-bedroom-design-gulshan-2-3000-sqft-featured.webp') }}" alt="Luxury Master Bedroom in Gulshan 2" onerror="this.src='{{ asset('images/banner-4.webp') }}'">
                    <div class="project-overlay">
                        <a href="{{ route('project.hub', 'master-bedroom-interior-design-projects-bangladesh') }}" class="project-overlay-link">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-badge">Gulshan 2, Dhaka</div>
                    <h4><a href="{{ route('project.hub', 'master-bedroom-interior-design-projects-bangladesh') }}">Luxury Master Bedroom Suite</a></h4>
                    <p>Fluted acoustic paneling, integrated warm LED cove lighting & bespoke walk-in closet.</p>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="project-item-card" data-category="kitchen">
                <div class="project-img-box">
                    <img src="{{ asset('images/traditional-kitchen-carosel.jpg') }}" alt="Traditional Island Kitchen" onerror="this.src='{{ asset('images/banner-3.webp') }}'">
                    <div class="project-overlay">
                        <a href="{{ route('project.hub', 'modular-kitchen-projects-bangladesh') }}" class="project-overlay-link">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-badge">Banani, Dhaka</div>
                    <h4><a href="{{ route('project.hub', 'modular-kitchen-projects-bangladesh') }}">Traditional Handcrafted Kitchen</a></h4>
                    <p>Marine-plywood carcasses, quartz countertops, Blum soft-closing hardware.</p>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="project-item-card" data-category="living">
                <div class="project-img-box">
                    <img src="{{ asset('images/modern-living-room-design-uttara-sector-6-1600-sqft-featured.webp') }}" alt="Modern Living Room in Uttara" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                    <div class="project-overlay">
                        <a href="{{ route('project.hub', 'living-room-interior-design-projects-bangladesh') }}" class="project-overlay-link">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-badge">Uttara Sector 6</div>
                    <h4><a href="{{ route('project.hub', 'living-room-interior-design-projects-bangladesh') }}">Minimalist Living Room & TV Wall</a></h4>
                    <p>Sleek floating console, micro-cement backdrop, customized sectional sofa.</p>
                </div>
            </div>

            <!-- Project 4 -->
            <div class="project-item-card" data-category="dining">
                <div class="project-img-box">
                    <img src="{{ asset('images/luxury-dining-space-design-4-1-600x450.webp') }}" alt="Luxury Dining Space" onerror="this.src='{{ asset('images/banner-2.webp') }}'">
                    <div class="project-overlay">
                        <a href="{{ route('project.hub', 'dining-room-interior-design-projects-bangladesh') }}" class="project-overlay-link">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-badge">Bashundhara R/A</div>
                    <h4><a href="{{ route('project.hub', 'dining-room-interior-design-projects-bangladesh') }}">Contemporary 8-Seater Dining Space</a></h4>
                    <p>Sintered stone table with custom fluted brass pedestals and drop chandelier.</p>
                </div>
            </div>

            <!-- Project 5 -->
            <div class="project-item-card" data-category="bedroom">
                <div class="project-img-box">
                    <img src="{{ asset('images/luxury-girls-bedroom-design-1-3-600x450.webp') }}" alt="Luxury Bedroom Suite" onerror="this.src='{{ asset('images/bedroom-design-service.webp') }}'">
                    <div class="project-overlay">
                        <a href="{{ route('project.hub', 'bedroom-interior-design-projects-bangladesh') }}" class="project-overlay-link">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-badge">Dhanmondi, Dhaka</div>
                    <h4><a href="{{ route('project.hub', 'bedroom-interior-design-projects-bangladesh') }}">Pastel Modern Bedroom Suite</a></h4>
                    <p>Custom study desk, arched shelving with concealed LED strips, and padded headboard.</p>
                </div>
            </div>

            <!-- Project 6 -->
            <div class="project-item-card" data-category="kitchen">
                <div class="project-img-box">
                    <img src="{{ asset('images/open-kitchen-design-carousel.jpg') }}" alt="Open Concept Modular Kitchen" onerror="this.src='{{ asset('images/open-kitchen-design-600x393.webp') }}'">
                    <div class="project-overlay">
                        <a href="{{ route('project.hub', 'open-kitchen-design-projects-bangladesh') }}" class="project-overlay-link">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-badge">Baridhara DOHS</div>
                    <h4><a href="{{ route('project.hub', 'open-kitchen-design-projects-bangladesh') }}">Open Concept Breakfast Bar & Kitchen</a></h4>
                    <p>Seamless transition from open kitchen to formal dining with hidden storage.</p>
                </div>
            </div>
        </div>

        <div class="text-center" style="margin-top:2.5rem;">
            <a href="{{ route('projects') }}" class="btn btn-outline-dark">
                Explore All 500+ Projects <i class="fas fa-arrow-right" style="margin-left:0.5rem;"></i>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================================================
     TRIANGLE INTERIOR DESIGN AT A GLANCE (Stats Counter)
     ========================================================================== -->
<section class="section-padding" style="background:#111317; color:#ffffff;" id="statsSection">
    <div class="container">
        <div class="section-title-wrap text-center">
            <h2 class="services-main-heading" style="color:#ffffff;">TRIANGLE INTERIOR DESIGN AT A GLANCE</h2>
        </div>

        <div class="stats-counter-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-home"></i></div>
                <div class="stat-value">500+</div>
                <div class="stat-title">Homes Handed Over</div>
                <p class="stat-desc">Residential apartments, duplex villas, and premium penthouses across Bangladesh.</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
                <div class="stat-value">15+</div>
                <div class="stat-title">Years of Excellence</div>
                <p class="stat-desc">Established in 2011 with uninterrupted architectural and interior mastery.</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-tools"></i></div>
                <div class="stat-value">50+</div>
                <div class="stat-title">Master Craftsmen</div>
                <p class="stat-desc">Full-time joinery carpenters, finish specialists, and site supervisors in East Badda.</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-smile"></i></div>
                <div class="stat-value">100%</div>
                <div class="stat-title">Client Satisfaction</div>
                <p class="stat-desc">Transparent BOQs, zero hidden costs, and comprehensive 5-year warranties.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     ABOUT TRIANGLE INTERIOR DESIGN
     ========================================================================== -->
<section class="section-padding" style="background:#ffffff;" id="aboutSection">
    <div class="container">
        <div class="about-grid">
            <div class="about-content">
                <h2 style="font-size:2.2rem; font-weight:800; margin-bottom:1.25rem; font-family:var(--font-heading); color:var(--color-dark);">
                    About Triangle Interior Design – A Leading Interior Design Company in Dhaka
                </h2>
                <p style="color:#475569; margin-bottom:1rem; font-size:1.05rem; line-height:1.75;">
                    Triangle Interior Design is a full-service turnkey interior architecture and fit-out firm based in Mohakhali New DOHS, Dhaka. We bridge visionary 3D spatial planning with rigorous in-house manufacturing.
                </p>
                <p style="color:#475569; margin-bottom:1.5rem; font-size:1rem; line-height:1.75;">
                    Unlike brokers who outsource carpentry to random third parties, we operate our own state-of-the-art joinery factory in East Badda, Dhaka. This allows us to guarantee premium Gorjan marine-grade ply, high-pressure lamination, automated PVC edge banding, and German Blum / Hafele hardware.
                </p>

                <div class="about-features-list">
                    <div class="about-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Zero middleman markup with direct factory-to-site joinery</span>
                    </div>
                    <div class="about-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Detailed itemized BOQs with every square inch calculated</span>
                    </div>
                    <div class="about-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Dedicated project managers sending daily photo progress updates</span>
                    </div>
                    <div class="about-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>5-Year comprehensive post-handover service warranty</span>
                    </div>
                </div>

                <div style="margin-top:2rem; display:flex; gap:1rem; flex-wrap:wrap;">
                    <button type="button" class="btn btn-primary open-consultation-modal">
                        Book a Studio Visit
                    </button>
                    <a href="tel:+8801810536303" class="btn btn-outline-dark">
                        <i class="fas fa-phone-alt"></i> Call +8801810536303
                    </a>
                </div>
            </div>

            <div class="about-visual">
                <div class="about-img-frame">
                    <img src="{{ asset('images/modern-living-room-design-uttara-sector-6-1600-sqft-featured.webp') }}" alt="Triangle Interior Design Studio" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                </div>
                <div class="about-floating-badge">
                    <div class="badge-num">15+</div>
                    <div class="badge-text">Years of Turnkey Excellence in Bangladesh</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     INTERIOR DESIGN SERVICE AREAS ACROSS BANGLADESH
     ========================================================================== -->
<section class="section-padding bg-light" id="areasSection">
    <div class="container">
        <div class="section-title-wrap text-center">
            <h2 class="services-main-heading">INTERIOR DESIGN SERVICE AREAS ACROSS BANGLADESH</h2>
            <p style="color:#64748b; max-width:700px; margin:0.75rem auto 0 auto;">
                Our design architects and mobile installation teams operate in all premier residential neighborhoods in Dhaka and major commercial hubs across Bangladesh.
            </p>
        </div>

        <div class="areas-grid">
            <a href="{{ route('area.landing', 'gulshan') }}" class="area-pill-card">
                <i class="fas fa-map-marker-alt"></i>
                <span>Gulshan 1 & 2</span>
            </a>
            <a href="{{ route('area.landing', 'banani') }}" class="area-pill-card">
                <i class="fas fa-map-marker-alt"></i>
                <span>Banani & DOHS</span>
            </a>
            <a href="{{ route('area.landing', 'uttara') }}" class="area-pill-card">
                <i class="fas fa-map-marker-alt"></i>
                <span>Uttara (All Sectors)</span>
            </a>
            <a href="{{ route('area.landing', 'dhanmondi') }}" class="area-pill-card">
                <i class="fas fa-map-marker-alt"></i>
                <span>Dhanmondi</span>
            </a>
            <a href="{{ route('area.landing', 'bashundhara') }}" class="area-pill-card">
                <i class="fas fa-map-marker-alt"></i>
                <span>Bashundhara R/A</span>
            </a>
            <a href="{{ route('area.landing', 'baridhara') }}" class="area-pill-card">
                <i class="fas fa-map-marker-alt"></i>
                <span>Baridhara Diplomatic</span>
            </a>
            <a href="{{ route('area.landing', 'mirpur') }}" class="area-pill-card">
                <i class="fas fa-map-marker-alt"></i>
                <span>Mirpur DOHS</span>
            </a>
            <a href="{{ route('area.landing', 'chittagong') }}" class="area-pill-card">
                <i class="fas fa-map-marker-alt"></i>
                <span>Chittagong (GEC & Nasirabad)</span>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================================================
     WHY 500+ HOMEOWNERS TRUST TRIANGLE INTERIOR DESIGN
     ========================================================================== -->
<section class="section-padding" style="background:#ffffff;" id="trustSection">
    <div class="container">
        <div class="section-title-wrap text-center">
            <h2 class="services-main-heading">WHY 500+ HOMEOWNERS TRUST TRIANGLE INTERIOR DESIGN</h2>
        </div>

        <div class="trust-grid">
            <div class="trust-card">
                <div class="trust-number">01</div>
                <h4>15+ Years of Interior Excellence</h4>
                <p>Since 2011, our architectural engineers have turned hundreds of standard shell apartments into timeless, comfortable luxury spaces.</p>
            </div>

            <div class="trust-card">
                <div class="trust-number">02</div>
                <h4>Clear, Itemized BOQ Project Pricing</h4>
                <p>No sudden cost surprises or vague lump-sum estimates. Every running foot of cabinetry, electrical point, and paint square foot is itemized transparently.</p>
            </div>

            <div class="trust-card">
                <div class="trust-number">03</div>
                <h4>In-House Factory Manufacturing</h4>
                <p>Equipped with precision saws, vacuum membrane presses, and automated edge-banders in East Badda for joinery that lasts decades.</p>
            </div>

            <div class="trust-card">
                <div class="trust-number">04</div>
                <h4>5-Year Craftsmanship Warranty</h4>
                <p>We stand behind our materials and installation with 5-year free maintenance support for hinges, drawer runners, and structural joinery.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     FREQUENTLY ASKED QUESTIONS
     ========================================================================== -->
<section class="section-padding bg-light" id="faqsSection">
    <div class="container" style="max-width:960px;">
        <div class="section-title-wrap text-center">
            <h2 class="services-main-heading">FREQUENTLY ASKED QUESTIONS</h2>
            <p style="color:#64748b;">Direct answers regarding costs, timelines, factory visits, and material specifications.</p>
        </div>

        <div class="faq-accordion-wrap">
            <div class="faq-accordion-item">
                <button class="faq-accordion-header" type="button">
                    <span>What is the typical cost of interior design per sqft in Bangladesh?</span>
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-accordion-body">
                    <p>Interior design costs in Bangladesh generally range from ৳1,200 to ৳3,500+ per square foot depending on the scope. A basic turnkey fit-out with standard Gorjan ply and paint starts around ৳1,200–৳1,800/sqft, while luxury turnkey solutions with imported hardware, fluted accents, marble, and custom furniture range between ৳2,200–৳3,500/sqft. Triangle Interior Design provides 100% itemized BOQ quotes after site measurement.</p>
                </div>
            </div>

            <div class="faq-accordion-item">
                <button class="faq-accordion-header" type="button">
                    <span>How long does a full home interior project take to complete?</span>
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-accordion-body">
                    <p>For a standard 1,800–2,500 sqft apartment, complete handover typically takes 45 to 60 working days from 3D approval. Because 80% of our cabinetry and furniture is prefabricated in our East Badda factory, on-site noise and disturbance are minimized.</p>
                </div>
            </div>

            <div class="faq-accordion-item">
                <button class="faq-accordion-header" type="button">
                    <span>Can I visit your furniture manufacturing factory before signing?</span>
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-accordion-body">
                    <p>Absolutely! We encourage clients to visit both our design studio in Mohakhali New DOHS and our factory in East Badda, Dhaka. You can inspect raw materials, edge-banding machines, and live joinery work before making a commitment.</p>
                </div>
            </div>

            <div class="faq-accordion-item">
                <button class="faq-accordion-header" type="button">
                    <span>What materials and hardware brands do you use?</span>
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-accordion-body">
                    <p>We use BWR/BWP grade Gorjan marine plywood, Malaysian engineered boards, Merino/Greenlam high-pressure laminates, and genuine German Blum, Hafele, or FGV soft-closing hardware to ensure decades of moisture-resistant durability.</p>
                </div>
            </div>

            <div class="faq-accordion-item">
                <button class="faq-accordion-header" type="button">
                    <span>How can I schedule a consultation or site survey?</span>
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-accordion-body">
                    <p>You can call our direct hotline at <a href="tel:+8801810536303" style="color:var(--color-primary); font-weight:700;">+8801810536303</a>, message us on <a href="https://wa.me/8801810536303" style="color:#25d366; font-weight:700;">WhatsApp (+8801810536303)</a>, or click the "Get Free Consultation" button above. Our senior architects will coordinate a free visit.</p>
                </div>
            </div>
        </div>

        <div class="text-center" style="margin-top:2rem;">
            <a href="{{ route('faqs') }}" class="btn btn-outline-dark">
                View All 38 Frequently Asked Questions <i class="fas fa-arrow-right" style="margin-left:0.4rem;"></i>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================================================
     FINAL CALL TO ACTION BANNER
     ========================================================================== -->
<section class="cta-banner-section" style="background:linear-gradient(135deg, #111317 0%, #1e222a 100%); color:#ffffff; padding:4.5rem 0; text-align:center;">
    <div class="container">
        <h2 style="font-size:2.4rem; font-weight:800; color:#ffffff; margin-bottom:1rem; font-family:var(--font-heading);">
            Interested in a Location-Specific Consultation?
        </h2>
        <p style="color:#cbd5e1; font-size:1.15rem; max-width:680px; margin:0 auto 2rem auto;">
            Speak directly with our principal interior architects. Call our hotline or book your 3D consultation today.
        </p>
        <div style="display:flex; justify-content:center; gap:1.25rem; flex-wrap:wrap;">
            <a href="tel:+8801810536303" class="btn btn-primary" style="font-size:1.1rem; padding:1rem 2rem;">
                <i class="fas fa-phone-alt"></i> Call +8801810536303
            </a>
            <a href="https://wa.me/8801810536303" target="_blank" rel="noopener noreferrer" class="btn" style="background:#25d366; color:#ffffff; font-size:1.1rem; padding:1rem 2rem; border-radius:var(--radius-sm); font-weight:700;">
                <i class="fab fa-whatsapp"></i> Chat on WhatsApp
            </a>
            <button type="button" class="btn btn-outline-white open-consultation-modal" style="font-size:1.1rem; padding:1rem 2rem;">
                Book Free Consultation
            </button>
        </div>
    </div>
</section>
@endsection
