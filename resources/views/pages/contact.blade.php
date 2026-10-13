@extends('layouts.app')

@section('title', 'Contact Us – Triangle Interior Design Interior Design Dhaka')
@section('meta_description', 'Contact Triangle Interior Design in Mohakhali New DOHS, Dhaka. Call 01810 536 303 or visit our studio and factory in West Badda. Book a free interior design consultation.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <span class="section-subtitle">Get In Touch</span>
        <h1 style="font-size:3rem; color:#fff; margin-bottom:1rem;">Contact Triangle Interior Design</h1>
        <p style="color:#94a3b8; max-width:650px; margin:0 auto; font-size:1.1rem;">
            Visit our design studio in Mohakhali New DOHS or tour our custom furniture factory in West Badda. We are always ready to discuss your dream space.
        </p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <!-- 3 Contact Cards -->
        <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap:2rem; margin-bottom:4.5rem;">
            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem; border-radius:var(--radius-md);">
                <div style="width:48px; height:48px; border-radius:50%; background:rgba(197,168,128,0.2); color:var(--color-primary-dark); display:flex; align-items:center; justify-content:center; font-size:1.25rem; margin-bottom:1.25rem;">
                    <i class="fas fa-building"></i>
                </div>
                <h3 style="font-size:1.25rem; margin-bottom:0.5rem;">Design Studio</h3>
                <p style="color:var(--color-text-muted); font-size:0.9rem; line-height:1.6; margin-bottom:1rem;">
                    House 127 (2nd floor), Road 05, Mohakhali New DOHS, Dhaka 1206, Bangladesh
                </p>
                <div style="font-size:0.875rem; color:var(--color-text-main); font-weight:600;">
                    <i class="fas fa-clock" style="color:var(--color-primary-dark); margin-right:0.3rem;"></i> Sat - Thu: 9 AM - 6 PM
                </div>
            </div>

            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem; border-radius:var(--radius-md);">
                <div style="width:48px; height:48px; border-radius:50%; background:rgba(197,168,128,0.2); color:var(--color-primary-dark); display:flex; align-items:center; justify-content:center; font-size:1.25rem; margin-bottom:1.25rem;">
                    <i class="fas fa-industry"></i>
                </div>
                <h3 style="font-size:1.25rem; margin-bottom:0.5rem;">Manufacturing Factory</h3>
                <p style="color:var(--color-text-muted); font-size:0.9rem; line-height:1.6; margin-bottom:1rem;">
                    1920, Koborsthan Road, East Badda, Dhaka 1212, Bangladesh
                </p>
                <div style="font-size:0.875rem; color:var(--color-text-main); font-weight:600;">
                    <i class="fas fa-phone-alt" style="color:var(--color-primary-dark); margin-right:0.3rem;"></i> +8801904654712
                </div>
            </div>

            <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem; border-radius:var(--radius-md);">
                <div style="width:48px; height:48px; border-radius:50%; background:rgba(197,168,128,0.2); color:var(--color-primary-dark); display:flex; align-items:center; justify-content:center; font-size:1.25rem; margin-bottom:1.25rem;">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 style="font-size:1.25rem; margin-bottom:0.5rem;">Direct Hotlines</h3>
                <p style="color:var(--color-text-muted); font-size:0.9rem; line-height:1.6; margin-bottom:1rem;">
                    Call us for quick quotes or instant site survey scheduling.
                </p>
                <div style="font-size:0.95rem; font-weight:700;">
                    <a href="tel:{{ $settings['phone'] ?? '+8801904654712' }}" style="color:var(--color-primary-dark);">
                        {{ $settings['phone_display'] ?? '01904 654 712' }}
                    </a>
                </div>
                <div style="font-size:0.85rem; color:var(--color-text-muted); margin-top:0.3rem;">
                    <a href="mailto:{{ $settings['email'] ?? 'info@triangleinterior.com' }}">{{ $settings['email'] ?? 'info@triangleinterior.com' }}</a>
                </div>
            </div>
        </div>

        <!-- Contact Grid with Form & Map -->
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:3.5rem; align-items:center;">
            <!-- Form Card -->
            <div style="background:#0e1013; color:#fff; padding:3rem; border-radius:var(--radius-lg); border:1px solid rgba(197,168,128,0.3); box-shadow:var(--shadow-lg);">
                <h2 style="color:#fff; font-size:2rem; margin-bottom:0.5rem;">Send Us A Message</h2>
                <p style="color:#94a3b8; font-size:0.9rem; margin-bottom:2rem;">
                    Fill in your details below and an architect will reach back promptly.
                </p>

                <form action="{{ route('inquiry.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Mahbubur Rahman" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number *</label>
                        <input type="tel" name="phone" class="form-control" placeholder="e.g. 017XXXXXXXX" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="e.g. mahbub@example.com">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Project Location</label>
                        <input type="text" name="location" class="form-control" placeholder="e.g. Uttara Sector 5, Dhaka">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Scope / Requirements</label>
                        <textarea name="message" class="form-control" rows="4" placeholder="Describe your flat size, requirements, and timeline..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%; padding:0.95rem; font-size:1rem;">
                        <i class="fas fa-paper-plane"></i> Send Inquiry
                    </button>
                </form>
            </div>

            <!-- Map & Studio Details -->
            <div>
                <h2 style="font-size:2rem; margin-bottom:1rem;">Visit Our Mohakhali Design Studio</h2>
                <p style="color:var(--color-text-muted); font-size:1.05rem; line-height:1.7; margin-bottom:2rem;">
                    Conveniently located in Mohakhali New DOHS with secure parking. Explore material sample boards, handle finishes, acrylic swatches, and meet our senior design architects.
                </p>

                <div style="border-radius:var(--radius-md); overflow:hidden; border:1px solid var(--color-border-light); height:380px; box-shadow:var(--shadow-md);">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.134842183296!2d90.3957279!3d23.778211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c76ef4827fb7%3A0x6b10fa095a4f7e53!2sNew%20DOHS%2C%20Mohakhali%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
