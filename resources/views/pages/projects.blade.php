@extends('layouts.app')

@section('title', 'Interior Design Projects in Bangladesh – Triangle Interior Design Portfolio')
@section('meta_description', 'Explore 500+ completed luxury interior design projects in Dhaka and across Bangladesh by Triangle Interior Design. View bedrooms, modular kitchens, living rooms, and closets.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <span class="section-subtitle">Real Handover Portfolio</span>
        <h1 style="font-size:3rem; color:#fff; margin-bottom:1rem;">Our Completed Projects</h1>
        <p style="color:#94a3b8; max-width:650px; margin:0 auto; font-size:1.1rem;">
            Over 500+ residential and commercial transformations executed with precision craftsmanship across Gulshan, Banani, Uttara, Bashundhara, and Dhanmondi.
        </p>

        <!-- Search Form -->
        <form action="{{ route('projects') }}" method="GET" style="max-width:500px; margin:2rem auto 0 auto; display:flex; gap:0.5rem;">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search by area or room (e.g. Gulshan, Kitchen)..." class="form-control" style="background:#16181d;">
            <button type="submit" class="btn btn-primary" style="padding:0.75rem 1.5rem;"><i class="fas fa-search"></i></button>
        </form>
    </div>
</section>

<section class="section-padding" style="background:var(--color-bg-light);">
    <div class="container">
        <!-- Category Filter Pills -->
        <div class="filter-nav">
            <a href="{{ route('projects') }}" class="filter-btn {{ !$selectedCategory ? 'active' : '' }}">All Projects</a>
            <a href="{{ route('project.hub', 'bedroom-interior-design-projects-bangladesh') }}" class="filter-btn">Bedroom Projects</a>
            <a href="{{ route('project.hub', 'modular-kitchen-projects-bangladesh') }}" class="filter-btn">Kitchen Projects</a>
            <a href="{{ route('project.hub', 'living-room-interior-design-projects-bangladesh') }}" class="filter-btn">Living Room</a>
            <a href="{{ route('project.hub', 'closet-design-projects-bangladesh') }}" class="filter-btn">Closets</a>
            <a href="{{ route('project.hub', 'dining-room-interior-design-projects-bangladesh') }}" class="filter-btn">Dining Area</a>
            <a href="{{ route('project.hub', 'luxury-interior-design-projects') }}" class="filter-btn">Luxury Projects</a>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid">
            @forelse($projects as $project)
                <div class="project-card">
                    <div class="project-card-thumb">
                        <a href="{{ route('project.detail', $project->slug) }}" style="display:block; width:100%; height:100%;">
                            <img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}" onerror="this.src='{{ asset('images/basabo-boys-bedroom-01-1024x768.webp') }}'">
                        </a>
                        <span class="project-card-category">{{ $project->category ?? 'Interior Design' }}</span>
                        <div class="project-card-overlay">
                            <a href="{{ route('project.detail', $project->slug) }}" class="btn btn-primary" style="padding:0.55rem 1.35rem; font-size:0.85rem; border-radius:50px;">
                                View Project Details
                            </a>
                        </div>
                    </div>
                    <div class="project-card-body">
                        <div class="project-card-location">
                            <i class="fas fa-map-marker-alt" style="color:var(--color-primary-dark);"></i>
                            {{ $project->location ?? 'Dhaka, Bangladesh' }}
                        </div>
                        <h2 class="project-card-title" style="font-size:1.25rem;">
                            <a href="{{ route('project.detail', $project->slug) }}">{{ $project->title }}</a>
                        </h2>
                        <div class="project-card-meta">
                            <span><i class="fas fa-vector-square"></i> {{ $project->area_sqft ?? '2,200 sq ft' }}</span>
                            <span><i class="fas fa-eye"></i> {{ $project->views_count }} views</span>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align:center; padding:4rem 1rem; color:#64748b;">
                    <i class="fas fa-folder-open" style="font-size:3rem; margin-bottom:1rem; opacity:0.5;"></i>
                    <h3>No projects found</h3>
                    <p>Try searching for a different keyword or category.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div style="margin-top:3.5rem; display:flex; justify-content:center;">
            {{ $projects->links('partials.pagination') }}
        </div>
    </div>
</section>
@endsection
