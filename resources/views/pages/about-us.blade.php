@extends('layouts.app')

@section('title', 'About Us – Triangle Interior Design Interior Design Dhaka')
@section('meta_description', 'About Triangle Interior Design: Established in 2011, Triangle Interior Design is Bangladesh’s leading architectural interior design and manufacturing firm with 500+ completed projects.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <span class="section-subtitle">Since 2011</span>
        <h1 style="font-size:3rem; color:#fff; margin-bottom:1rem;">About Triangle Interior Design</h1>
        <p style="color:#94a3b8; max-width:700px; margin:0 auto; font-size:1.15rem;">
            A premier team of architects, interior designers, and master craftsmen transforming residential and commercial environments into enduring works of art.
        </p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:4rem; align-items:center; margin-bottom:5rem;">
            <div>
                <span class="section-subtitle">Our Journey & Philosophy</span>
                <h2 style="font-size:2.4rem; margin-bottom:1.5rem;">Dedicated To Architectural Excellence</h2>
                <p style="color:var(--color-text-main); font-size:1.05rem; line-height:1.8; margin-bottom:1.5rem;">
                    Triangle Interior Design is a leading interior design company in Bangladesh, specializing in creating functional, aesthetic, and fully customized interior solutions for residential, commercial, and office spaces. Founded in 2011 and headquartered in Mohakhali New DOHS, Dhaka, the firm has successfully completed over 500 projects for clients nationwide.
                </p>
                <p style="color:var(--color-text-muted); font-size:1rem; line-height:1.7; margin-bottom:2rem;">
                    The company operates with a dedicated design studio in Mohakhali and an in-house manufacturing factory in West Badda, Dhaka. This unique combination gives us full control over quality from conceptual 3D renders to the final bolt and hinge.
                </p>
                <div style="display:flex; gap:2rem;">
                    <div>
                        <div style="font-size:2.5rem; font-weight:800; color:var(--color-primary-dark); font-family:var(--font-heading);">500+</div>
                        <div style="font-size:0.85rem; color:var(--color-text-muted); text-transform:uppercase;">Projects Handed Over</div>
                    </div>
                    <div>
                        <div style="font-size:2.5rem; font-weight:800; color:var(--color-primary-dark); font-family:var(--font-heading);">14+</div>
                        <div style="font-size:0.85rem; color:var(--color-text-muted); text-transform:uppercase;">Years in Bangladesh</div>
                    </div>
                    <div>
                        <div style="font-size:2.5rem; font-weight:800; color:var(--color-primary-dark); font-family:var(--font-heading);">50+</div>
                        <div style="font-size:0.85rem; color:var(--color-text-muted); text-transform:uppercase;">Designers & Craftsmen</div>
                    </div>
                </div>
            </div>

            <div>
                <div style="border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-lg);">
                    <img src="{{ asset('images/basabo-boys-bedroom-01-1024x768.webp') }}" alt="Triangle Interior Design Design Team Project">
                </div>
            </div>
        </div>

        <!-- Vision and Values -->
        <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:2rem;">
            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2.5rem; border-radius:var(--radius-md);">
                <i class="fas fa-compass" style="font-size:2rem; color:var(--color-primary-dark); margin-bottom:1.25rem;"></i>
                <h3 style="font-size:1.35rem; margin-bottom:0.75rem;">Our Design Philosophy</h3>
                <p style="color:var(--color-text-muted); line-height:1.7; font-size:0.95rem;">
                    We believe in balance: ergonomics, durability, and refined visual aesthetics. Every partition, light fixture, and cabinet must serve daily comfort while elevating space value.
                </p>
            </div>
            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2.5rem; border-radius:var(--radius-md);">
                <i class="fas fa-handshake" style="font-size:2rem; color:var(--color-primary-dark); margin-bottom:1.25rem;"></i>
                <h3 style="font-size:1.35rem; margin-bottom:0.75rem;">Financial Transparency</h3>
                <p style="color:var(--color-text-muted); line-height:1.7; font-size:0.95rem;">
                    No hidden line items or sudden price inflation. We stand by our itemized bill of quantities (BOQ) with written specifications and brand commitments.
                </p>
            </div>
            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2.5rem; border-radius:var(--radius-md);">
                <i class="fas fa-shield-alt" style="font-size:2rem; color:var(--color-primary-dark); margin-bottom:1.25rem;"></i>
                <h3 style="font-size:1.35rem; margin-bottom:0.75rem;">Built to Endure</h3>
                <p style="color:var(--color-text-muted); line-height:1.7; font-size:0.95rem;">
                    High-humidity resistance using genuine Gorjon marine plywood, European edge-banding adhesives, and world-class Blum & Hafele hardware.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
