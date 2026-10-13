@extends('layouts.app')

@section('title', 'Frequently Asked Questions – Triangle Interior Design Interior Design')
@section('meta_description', 'Have questions about interior design costs, 3D designs, duration, factory manufacturing, or warranties in Bangladesh? Read our 38 comprehensive FAQs.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <span class="section-subtitle">Got Questions? We Have Answers</span>
        <h1 style="font-size:3rem; color:#fff; margin-bottom:1rem;">Frequently Asked Questions</h1>
        <p style="color:#94a3b8; max-width:650px; margin:0 auto; font-size:1.1rem;">
            Explore answers regarding pricing, process, factory warranties, and site surveys across Bangladesh.
        </p>

        <!-- Search FAQ Input -->
        <div style="max-width:550px; margin:2.5rem auto 0 auto;">
            <input type="text" id="faqSearchInput" class="form-control" placeholder="Type a keyword (e.g. cost, factory, kitchen, warranty)..." style="background:#16181d; font-size:1rem; padding:0.9rem 1.25rem;">
        </div>
    </div>
</section>

<section class="section-padding" style="background:var(--color-bg-light);">
    <div class="container">
        <div class="faq-container">
            @foreach($faqs as $idx => $faq)
                <div class="faq-item {{ $idx === 0 ? 'active' : '' }}" data-question="{{ strtolower($faq->question) }}" data-answer="{{ strtolower($faq->answer) }}">
                    <div class="faq-question">
                        <span>{{ $faq->question }}</span>
                        <i class="fas fa-chevron-down faq-toggle-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="text-align:center; margin-top:4rem; background:#fff; padding:3.5rem 2rem; border-radius:var(--radius-md); border:1px solid var(--color-border-light); max-width:850px; margin-left:auto; margin-right:auto;">
            <h3 style="font-size:1.6rem; margin-bottom:0.75rem;">Still Have Questions?</h3>
            <p style="color:var(--color-text-muted); margin-bottom:1.5rem;">Speak with an interior architect right now or visit our Mohakhali studio.</p>
            <div style="display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;">
                <a href="tel:{{ $settings['phone'] ?? '+8801810536303' }}" class="btn btn-dark">
                    <i class="fas fa-phone-alt"></i> Call {{ $settings['phone_display'] ?? '01810 536 303' }}
                </a>
                <button type="button" class="btn btn-primary open-consultation-modal">
                    <i class="fas fa-calendar-check"></i> Book Consultation
                </button>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.getElementById('faqSearchInput')?.addEventListener('input', function() {
    const q = this.value.toLowerCase().trim();
    document.querySelectorAll('.faq-item').forEach(item => {
        const question = item.dataset.question || '';
        const answer = item.dataset.answer || '';
        if (question.includes(q) || answer.includes(q)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});
</script>
@endpush
@endsection
