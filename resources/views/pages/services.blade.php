@extends('layouts.app')

@section('title', 'Interior Design Services in Bangladesh – Triangle Interior Design')
@section('meta_description', 'Explore Triangle Interior Design’s full range of turnkey interior design services: home interior, modular kitchen, bedroom design, luxury closet, custom furniture, and commercial spaces.')

@section('content')
<section class="section-padding" style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <span class="section-subtitle">What We Do Best</span>
        <h1 style="font-size:3rem; color:#fff; margin-bottom:1rem;">Our Interior Design Services</h1>
        <p style="color:#94a3b8; max-width:650px; margin:0 auto; font-size:1.1rem;">
            Turnkey architectural planning, photorealistic 3D visualization, in-house factory joinery, and meticulous execution across Dhaka & Bangladesh.
        </p>
    </div>
</section>

<section class="section-padding" style="background:var(--color-bg-light);">
    <div class="container">
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
                        <h2 class="service-card-title" style="font-size:1.35rem;">
                            <a href="{{ route('service.detail', $service->slug) }}">{{ $service->title }}</a>
                        </h2>
                        <p class="service-card-text">
                            {{ Str::limit($service->excerpt ?: $service->description, 140) }}
                        </p>
                        <a href="{{ route('service.detail', $service->slug) }}" class="service-card-link">
                            View Service Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
