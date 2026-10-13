@extends('layouts.app')

@section('title', $categoryName . ' – Triangle Interior Design Portfolio')
@section('meta_description', 'Browse completed ' . $categoryName . ' across Bangladesh designed and manufactured by Triangle Interior Design. Premium architectural interiors in Dhaka.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <div style="display:flex; justify-content:center; gap:0.75rem; align-items:center; font-size:0.85rem; color:#94a3b8; margin-bottom:1.5rem;">
            <a href="{{ route('home') }}" style="color:#cbd5e1;">Home</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <a href="{{ route('projects') }}" style="color:#cbd5e1;">Projects</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <span style="color:var(--color-primary);">Hub</span>
        </div>
        <span class="section-subtitle">Dedicated Project Hub</span>
        <h1 style="font-size:2.85rem; color:#fff; margin-bottom:1rem;">{{ $categoryName }}</h1>
        <p style="color:#94a3b8; max-width:700px; margin:0 auto; font-size:1.1rem;">
            Explore turnkey executions in {{ strtolower($categoryName) }} crafted with precision joinery and world-class imported materials by Triangle Interior Design.
        </p>
    </div>
</section>

<section class="section-padding" style="background:var(--color-bg-light);">
    <div class="container">
        <!-- Projects Grid -->
        <div class="projects-grid">
            @forelse($projects as $project)
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
                <div style="grid-column:1 / -1; text-align:center; padding:4rem 1rem;">
                    <h3>No projects found in this hub</h3>
                    <a href="{{ route('projects') }}" class="btn btn-dark" style="margin-top:1rem;">Back to All Projects</a>
                </div>
            @endforelse
        </div>

        <div style="margin-top:3.5rem; display:flex; justify-content:center;">
            {{ $projects->links('partials.pagination') }}
        </div>
    </div>
</section>
@endsection
