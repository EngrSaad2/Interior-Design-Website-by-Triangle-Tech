@extends('layouts.app')

@section('title', $project->title . ' – Triangle Interior Design Project')
@section('meta_description', Str::limit(strip_tags($project->description), 155))
@section('og_image', asset($project->featured_image))
@section('meta_keywords', $project->title . ', interior design ' . ($project->location ?? 'dhaka') . ', residential interior bangladesh')

@push('scripts')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ route('home') }}"
    },
    {
      "@@type": "ListItem",
      "position": 2,
      "name": "Projects",
      "item": "{{ route('projects') }}"
    },
    {
      "@@type": "ListItem",
      "position": 3,
      "name": "{{ $project->title }}",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>
@endpush

@section('content')
<!-- Project Hero -->
<section style="background:#0e1013; color:#fff; padding:5rem 0 3.5rem 0; border-bottom:1px solid rgba(255,255,255,0.08);">
    <div class="container">
        <div style="display:flex; gap:0.75rem; align-items:center; font-size:0.85rem; color:#94a3b8; margin-bottom:1.5rem;">
            <a href="{{ route('home') }}" style="color:#cbd5e1;">Home</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <a href="{{ route('projects') }}" style="color:#cbd5e1;">Projects</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <span style="color:var(--color-primary);">{{ $project->title }}</span>
        </div>
        <span class="section-subtitle">{{ $project->category ?? 'Interior Design' }}</span>
        <h1 style="font-size:2.85rem; color:#fff; margin-bottom:1.5rem;">{{ $project->title }}</h1>

        <!-- Spec Badges -->
        <div style="display:flex; flex-wrap:wrap; gap:1.5rem; color:#cbd5e1; font-size:0.95rem; border-top:1px solid rgba(255,255,255,0.1); padding-top:1.5rem;">
            <div>
                <span style="color:#94a3b8; display:block; font-size:0.8rem; text-transform:uppercase;">Location:</span>
                <strong><i class="fas fa-map-marker-alt" style="color:var(--color-primary);"></i> {{ $project->location ?? 'Dhaka, Bangladesh' }}</strong>
            </div>
            <div>
                <span style="color:#94a3b8; display:block; font-size:0.8rem; text-transform:uppercase;">Apartment Size:</span>
                <strong><i class="fas fa-vector-square" style="color:var(--color-primary);"></i> {{ $project->area_sqft ?? '2,200 sq ft' }}</strong>
            </div>
            <div>
                <span style="color:#94a3b8; display:block; font-size:0.8rem; text-transform:uppercase;">Completion:</span>
                <strong><i class="fas fa-calendar-check" style="color:var(--color-primary);"></i> {{ $project->completion_year ?? '2025' }}</strong>
            </div>
            <div>
                <span style="color:#94a3b8; display:block; font-size:0.8rem; text-transform:uppercase;">Scope:</span>
                <strong><i class="fas fa-tools" style="color:var(--color-primary);"></i> Full Turnkey Joinery & Execution</strong>
            </div>
        </div>
    </div>
</section>

<!-- Project Body -->
<section class="section-padding">
    <div class="container">
        <!-- Main Featured Image -->
        @if($project->featured_image)
            <div style="border-radius:var(--radius-lg); overflow:hidden; margin-bottom:3.5rem; box-shadow:var(--shadow-lg);">
                <img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}" style="width:100%; max-height:650px; object-fit:cover;" onerror="this.src='{{ asset('images/basabo-boys-bedroom-01-1024x768.webp') }}'">
            </div>
        @endif

        <div style="display:grid; grid-template-columns: 2fr 1fr; gap:4rem;">
            <!-- Left Info -->
            <div>
                <h2 style="font-size:2rem; margin-bottom:1.25rem;">Project Overview & Design Concept</h2>
                <div style="font-size:1.05rem; line-height:1.8; color:var(--color-text-main); margin-bottom:3rem; white-space:pre-line;">
                    {{ $project->description }}
                </div>

                <!-- Materials & Execution Details -->
                <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem; border-radius:var(--radius-md); margin-bottom:3.5rem;">
                    <h3 style="font-size:1.4rem; margin-bottom:1.25rem;">Material Specifications & Craftsmanship</h3>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem;">
                        <div style="display:flex; gap:0.75rem;">
                            <i class="fas fa-cubes" style="color:var(--color-primary-dark); font-size:1.2rem; margin-top:0.2rem;"></i>
                            <div>
                                <strong>Core Board Material</strong>
                                <p style="font-size:0.875rem; color:var(--color-text-muted);">Gorjon Marine Plywood & Action TESA HDF</p>
                            </div>
                        </div>
                        <div style="display:flex; gap:0.75rem;">
                            <i class="fas fa-wrench" style="color:var(--color-primary-dark); font-size:1.2rem; margin-top:0.2rem;"></i>
                            <div>
                                <strong>Hardware & Fittings</strong>
                                <p style="font-size:0.875rem; color:var(--color-text-muted);">Blum Soft-Close Dampers & Hafele Handles</p>
                            </div>
                        </div>
                        <div style="display:flex; gap:0.75rem;">
                            <i class="fas fa-paint-roller" style="color:var(--color-primary-dark); font-size:1.2rem; margin-top:0.2rem;"></i>
                            <div>
                                <strong>Surface Finish</strong>
                                <p style="font-size:0.875rem; color:var(--color-text-muted);">Dust-Free High Gloss Acrylic & Matte PU Lacquer</p>
                            </div>
                        </div>
                        <div style="display:flex; gap:0.75rem;">
                            <i class="fas fa-industry" style="color:var(--color-primary-dark); font-size:1.2rem; margin-top:0.2rem;"></i>
                            <div>
                                <strong>Joinery Production</strong>
                                <p style="font-size:0.875rem; color:var(--color-text-muted);">100% In-House West Badda Factory Fabrication</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photo Gallery -->
                @if(!empty($project->gallery) && count($project->gallery) > 1)
                    <h3 style="font-size:1.8rem; margin-bottom:1.5rem;">Full Resolution Project Gallery</h3>
                    <div style="display:grid; grid-template-columns: repeat(2, 1fr); gap:1.5rem;">
                        @foreach($project->gallery as $galImg)
                            <div style="border-radius:var(--radius-md); overflow:hidden; height:280px; box-shadow:var(--shadow-sm);">
                                <img src="{{ asset($galImg) }}" alt="{{ $project->title }} photo" style="width:100%; height:100%; object-fit:cover;" onerror="this.src='{{ asset('images/basabo-boys-bedroom-03-1024x768.webp') }}'">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right Sidebar CTA -->
            <div>
                <div style="position:sticky; top:110px;">
                    <div style="background:#0e1013; color:#fff; padding:2.25rem; border-radius:var(--radius-md); border:1px solid rgba(197,168,128,0.3); box-shadow:var(--shadow-md);">
                        <h3 style="color:#fff; font-size:1.4rem; margin-bottom:0.75rem;">Love This Design?</h3>
                        <p style="color:#94a3b8; font-size:0.9rem; margin-bottom:1.5rem;">
                            Schedule a site consultation to get a tailored layout and itemized budget estimate for your flat.
                        </p>
                        
                        <form action="{{ route('inquiry.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="service_type" value="Project: {{ $project->title }}">
                            <div class="form-group">
                                <label class="form-label" style="font-size:0.8rem;">Your Full Name *</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. Asif Rahman" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="font-size:0.8rem;">Phone Number *</label>
                                <input type="tel" name="phone" class="form-control" placeholder="e.g. 017XXXXXXXX" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="font-size:0.8rem;">Flat Location / Area</label>
                                <input type="text" name="location" class="form-control" placeholder="e.g. {{ $project->location }}">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width:100%; margin-top:0.5rem;">
                                Request Similar Design Quote
                            </button>
                        </form>

                        <div style="margin-top:1.5rem; text-align:center;">
                            <a href="https://wa.me/8801904654712?text=Hi%20Triangle%20Studio,%20I%20am%20interested%20in%20a%20project%20like%20{{ urlencode($project->title) }}" target="_blank" rel="noopener noreferrer" style="color:#25d366; font-size:0.9rem; font-weight:700; display:inline-flex; align-items:center; gap:0.4rem;">
                                <i class="fab fa-whatsapp"></i> Chat on WhatsApp Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Projects -->
        @if($relatedProjects->isNotEmpty())
            <div style="margin-top:6rem; border-top:1px solid var(--color-border-light); padding-top:4rem;">
                <h3 style="font-size:2rem; margin-bottom:2rem; text-align:center;">Explore More Projects</h3>
                <div class="projects-grid">
                    @foreach($relatedProjects as $relProj)
                        <div class="project-card">
                            <div class="project-card-thumb">
                                <img src="{{ asset($relProj->featured_image) }}" alt="{{ $relProj->title }}" onerror="this.src='{{ asset('images/basabo-boys-bedroom-02-1024x768.webp') }}'">
                                <span class="project-card-category">{{ $relProj->category }}</span>
                            </div>
                            <div class="project-card-body">
                                <h4 class="project-card-title">
                                    <a href="{{ route('project.detail', $relProj->slug) }}">{{ $relProj->title }}</a>
                                </h4>
                                <div class="project-card-location">
                                    <i class="fas fa-map-marker-alt" style="color:var(--color-primary-dark);"></i>
                                    {{ $relProj->location }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
