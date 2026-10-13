@extends('layouts.app')

@section('title', 'Best Interior Design Company in ' . $formattedArea . ' – DIT Studio')
@section('meta_description', 'Looking for the best interior design company in ' . $formattedArea . '? DIT Studio has executed hundreds of luxury homes and commercial spaces with factory-direct joinery.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <span class="section-subtitle">Local Interior Design Specialists</span>
        <h1 style="font-size:3rem; color:#fff; margin-bottom:1rem;">Best Interior Design Company in {{ $formattedArea }}</h1>
        <p style="color:#94a3b8; max-width:700px; margin:0 auto; font-size:1.15rem;">
            Delivering bespoke residential and office interiors across {{ $formattedArea }} with in-house factory manufacturing in West Badda, Dhaka.
        </p>
        <div style="margin-top:2rem;">
            <button type="button" class="btn btn-primary open-consultation-modal">
                <i class="fas fa-calendar-check"></i> Book Site Survey in {{ $formattedArea }}
            </button>
        </div>
    </div>
</section>

<!-- Why Clients in This Area Choose DIT Studio -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Why Homeowners in {{ $formattedArea }} Trust Us</span>
            <h2 class="section-title">Tailored Luxury For {{ $formattedArea }} Apartments</h2>
            <p class="section-desc">
                From luxury apartments to spacious duplexes, we understand the layout ergonomics, ventilation, and prestige expected in {{ $formattedArea }}.
            </p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:2rem; margin-bottom:5rem;">
            <div style="background:var(--color-bg-light); padding:2rem; border-radius:var(--radius-md); border:1px solid var(--color-border-light);">
                <i class="fas fa-ruler-combined" style="font-size:2rem; color:var(--color-primary-dark); margin-bottom:1rem;"></i>
                <h3 style="font-size:1.25rem; margin-bottom:0.5rem;">Complimentary Site Survey</h3>
                <p style="color:var(--color-text-muted); font-size:0.9rem;">We visit your apartment in {{ $formattedArea }} for 3D laser measurements and space analysis.</p>
            </div>
            <div style="background:var(--color-bg-light); padding:2rem; border-radius:var(--radius-md); border:1px solid var(--color-border-light);">
                <i class="fas fa-industry" style="font-size:2rem; color:var(--color-primary-dark); margin-bottom:1rem;"></i>
                <h3 style="font-size:1.25rem; margin-bottom:0.5rem;">Direct Factory Build</h3>
                <p style="color:var(--color-text-muted); font-size:0.9rem;">No noise or dust in your building. Cabinets are precision crafted in our factory and installed swiftly.</p>
            </div>
            <div style="background:var(--color-bg-light); padding:2rem; border-radius:var(--radius-md); border:1px solid var(--color-border-light);">
                <i class="fas fa-award" style="font-size:2rem; color:var(--color-primary-dark); margin-bottom:1rem;"></i>
                <h3 style="font-size:1.25rem; margin-bottom:0.5rem;">5-Year Official Warranty</h3>
                <p style="color:var(--color-text-muted); font-size:0.9rem;">Enjoy peace of mind with our written warranty on joinery, hinges, and finishes.</p>
            </div>
        </div>

        <!-- Portfolio in This Area -->
        @if($projects->isNotEmpty())
            <div class="section-header">
                <span class="section-subtitle">Real Completed Work</span>
                <h2 class="section-title">Projects Near {{ $formattedArea }}</h2>
            </div>

            <div class="projects-grid">
                @foreach($projects as $proj)
                    <div class="project-card">
                        <div class="project-card-thumb">
                            <img src="{{ asset($proj->featured_image) }}" alt="{{ $proj->title }}" onerror="this.src='{{ asset('images/basabo-boys-bedroom-01-1024x768.webp') }}'">
                            <span class="project-card-category">{{ $proj->category }}</span>
                        </div>
                        <div class="project-card-body">
                            <div class="project-card-location">
                                <i class="fas fa-map-marker-alt" style="color:var(--color-primary-dark);"></i>
                                {{ $proj->location }}
                            </div>
                            <h3 class="project-card-title"><a href="{{ route('project.detail', $proj->slug) }}">{{ $proj->title }}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
