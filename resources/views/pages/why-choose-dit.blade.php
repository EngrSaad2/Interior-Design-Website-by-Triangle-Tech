@extends('layouts.app')

@section('title', 'Why Choose Triangle Interior Design? – Best Interior Design Company in Bangladesh')
@section('meta_description', 'Discover why Triangle Interior Design has been the trusted interior design firm in Dhaka since 2011. In-house factory, 8-step process, transparent BOQ pricing, and 100% on-time handover.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <span class="section-subtitle">The Triangle Interior Design Advantage</span>
        <h1 style="font-size:3rem; color:#fff; margin-bottom:1rem;">Why Choose Triangle Interior Design?</h1>
        <p style="color:#94a3b8; max-width:700px; margin:0 auto; font-size:1.15rem;">
            Founded in 2011, Triangle Interior Design has transformed over 500+ homes with uncompromising craftsmanship, in-house factory manufacturing, and complete financial transparency.
        </p>
    </div>
</section>

<!-- Core Pillars -->
<section class="section-padding">
    <div class="container">
        <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap:2.5rem; margin-bottom:5rem;">
            <div style="background:var(--color-bg-light); padding:2.5rem; border-radius:var(--radius-md); border:1px solid var(--color-border-light);">
                <div style="width:56px; height:56px; border-radius:50%; background:rgba(197,168,128,0.2); color:var(--color-primary-dark); display:flex; align-items:center; justify-content:center; font-size:1.5rem; margin-bottom:1.5rem;">
                    <i class="fas fa-industry"></i>
                </div>
                <h3 style="font-size:1.4rem; margin-bottom:0.75rem;">In-House Manufacturing</h3>
                <p style="color:var(--color-text-muted); font-size:0.95rem; line-height:1.7;">
                    Our high-precision manufacturing factory in West Badda gives us full control over edge-banding, board pressing, and joinery finish. We never rely on third-party carpentry vendors.
                </p>
            </div>

            <div style="background:var(--color-bg-light); padding:2.5rem; border-radius:var(--radius-md); border:1px solid var(--color-border-light);">
                <div style="width:56px; height:56px; border-radius:50%; background:rgba(197,168,128,0.2); color:var(--color-primary-dark); display:flex; align-items:center; justify-content:center; font-size:1.5rem; margin-bottom:1.5rem;">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3 style="font-size:1.4rem; margin-bottom:0.75rem;">100% Transparent BOQ</h3>
                <p style="color:var(--color-text-muted); font-size:0.95rem; line-height:1.7;">
                    Detailed itemized specifications with exact brand names, hardware codes, and square footage measurements. Zero surprise charges or budget escalations halfway through the project.
                </p>
            </div>

            <div style="background:var(--color-bg-light); padding:2.5rem; border-radius:var(--radius-md); border:1px solid var(--color-border-light);">
                <div style="width:56px; height:56px; border-radius:50%; background:rgba(197,168,128,0.2); color:var(--color-primary-dark); display:flex; align-items:center; justify-content:center; font-size:1.5rem; margin-bottom:1.5rem;">
                    <i class="fas fa-business-time"></i>
                </div>
                <h3 style="font-size:1.4rem; margin-bottom:0.75rem;">On-Time Handover Guarantee</h3>
                <p style="color:var(--color-text-muted); font-size:0.95rem; line-height:1.7;">
                    We operate with strict phase-by-phase project schedules. Every client receives weekly photographic progress updates, and handovers are completed punctually.
                </p>
            </div>
        </div>

        <!-- 8-Step Methodology -->
        <div class="section-header">
            <span class="section-subtitle">Our Systematic Approach</span>
            <h2 class="section-title">The 8-Step Design & Build Process</h2>
            <p class="section-desc">From your first conversation to the day you move into your dream interior.</p>
        </div>

        <div class="process-grid" style="margin-bottom:5rem;">
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
                <div class="process-card" style="background:var(--color-bg-light); border-color:var(--color-border-light);">
                    <div class="process-step-num" style="color:var(--color-primary-dark);">{{ $s['num'] }}</div>
                    <h3 class="process-title" style="color:var(--color-dark);">{{ $s['title'] }}</h3>
                    <p class="process-desc" style="color:var(--color-text-muted);">{{ $s['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- CTA Box -->
        <div style="background:#0e1013; color:#fff; padding:4rem; border-radius:var(--radius-lg); text-align:center; border:1px solid rgba(197,168,128,0.3);">
            <h2 style="color:#fff; font-size:2.4rem; margin-bottom:1rem;">Ready to Experience the Triangle Difference?</h2>
            <p style="color:#94a3b8; max-width:600px; margin:0 auto 2rem auto; font-size:1.1rem;">
                Visit our Mohakhali New DOHS design studio or tour our West Badda factory to inspect materials first-hand.
            </p>
            <button type="button" class="btn btn-primary open-consultation-modal" style="padding:1rem 2.5rem; font-size:1rem;">
                Book Free Consultation & Site Visit
            </button>
        </div>
    </div>
</section>
@endsection
