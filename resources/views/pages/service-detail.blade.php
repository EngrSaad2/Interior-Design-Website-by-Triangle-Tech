@extends('layouts.app')

@section('title', $service->title . ' in Bangladesh – Triangle Interior Design')
@section('meta_description', Str::limit(strip_tags($service->excerpt ?: $service->description), 155))

@section('content')
<!-- Service Hero -->
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0; border-bottom:1px solid rgba(255,255,255,0.08);">
    <div class="container">
        <div style="display:flex; gap:1rem; align-items:center; font-size:0.85rem; color:#94a3b8; margin-bottom:1.5rem;">
            <a href="{{ route('home') }}" style="color:#cbd5e1;">Home</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <a href="{{ route('services') }}" style="color:#cbd5e1;">Services</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <span style="color:var(--color-primary);">{{ $service->title }}</span>
        </div>
        <div style="max-width:850px;">
            <span class="section-subtitle">Turnkey Interior Specialist</span>
            <h1 style="font-size:3rem; color:#fff; margin-bottom:1.25rem;">{{ $service->title }}</h1>
            <p style="font-size:1.15rem; color:#94a3b8; line-height:1.7;">
                {{ $service->excerpt }}
            </p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="section-padding">
    <div class="container">
        <div style="display:grid; grid-template-columns: 2fr 1fr; gap:3.5rem;">
            <!-- Left Main Content -->
            <div>
                @if($service->featured_image)
                    <div style="border-radius:var(--radius-lg); overflow:hidden; margin-bottom:2.5rem; box-shadow:var(--shadow-md);">
                        <img src="{{ asset($service->featured_image) }}" alt="{{ $service->title }}" style="width:100%; height:450px; object-fit:cover;" onerror="this.src='{{ asset('images/basabo-boys-bedroom-01-1024x768.webp') }}'">
                    </div>
                @endif

                <h2 style="font-size:2rem; margin-bottom:1.25rem;">About This Service</h2>
                <div style="color:var(--color-text-main); font-size:1.05rem; line-height:1.8; margin-bottom:2.5rem; white-space:pre-line;">
                    {{ $service->description }}
                </div>

                <!-- Features Checklist -->
                <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem; border-radius:var(--radius-md); margin-bottom:3rem;">
                    <h3 style="font-size:1.35rem; margin-bottom:1.25rem;">Key Service Highlights</h3>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                        @foreach($service->features ?? [] as $feat)
                            <div style="display:flex; align-items:flex-start; gap:0.6rem;">
                                <i class="fas fa-check-circle" style="color:var(--color-primary-dark); margin-top:0.25rem;"></i>
                                <span style="font-size:0.95rem; font-weight:500;">{{ $feat }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Gallery Showcase -->
                @if(!empty($service->gallery) && count($service->gallery) > 1)
                    <h3 style="font-size:1.6rem; margin-bottom:1.5rem;">Project Showcase Gallery</h3>
                    <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap:1rem; margin-bottom:3rem;">
                        @foreach($service->gallery as $gImg)
                            <div style="border-radius:var(--radius-sm); overflow:hidden; height:180px;">
                                <img src="{{ asset($gImg) }}" alt="{{ $service->title }} Photo" style="width:100%; height:100%; object-fit:cover;" onerror="this.src='{{ asset('images/basabo-boys-bedroom-02-1024x768.webp') }}'">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right Sidebar -->
            <div>
                <!-- Book Consultation Widget -->
                <div style="background:#0e1013; color:#fff; padding:2rem; border-radius:var(--radius-md); margin-bottom:2rem; border:1px solid rgba(197,168,128,0.3);">
                    <h3 style="color:#fff; font-size:1.35rem; margin-bottom:0.75rem;">Get A Free Estimate</h3>
                    <p style="color:#94a3b8; font-size:0.875rem; margin-bottom:1.5rem;">Receive an architectural space analysis and itemized BOQ for {{ $service->title }}.</p>
                    
                    <form action="{{ route('inquiry.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service_type" value="{{ $service->title }}">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="location" class="form-control" placeholder="Apartment Location">
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100%;">
                            Request Free BOQ
                        </button>
                    </form>
                </div>

                <!-- Other Services Navigation -->
                <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:1.75rem; border-radius:var(--radius-md);">
                    <h4 style="font-size:1.15rem; margin-bottom:1.25rem;">Other Interior Services</h4>
                    <ul style="display:flex; flex-direction:column; gap:0.75rem;">
                        @foreach($allServices as $s)
                            <li>
                                <a href="{{ route('service.detail', $s->slug) }}" style="display:flex; justify-content:space-between; align-items:center; font-size:0.9rem; font-weight:600; color:var(--color-dark); padding:0.5rem 0; border-bottom:1px solid var(--color-border-light);">
                                    <span>{{ $s->title }}</span>
                                    <i class="fas fa-chevron-right" style="font-size:0.75rem; color:var(--color-primary-dark);"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
