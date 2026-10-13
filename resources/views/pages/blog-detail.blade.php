@extends('layouts.app')

@section('title', $blog->title . ' – DIT Studio Blog')
@section('meta_description', Str::limit(strip_tags($blog->excerpt ?: $blog->content), 155))

@section('content')
<!-- Blog Header -->
<section style="background:#0e1013; color:#fff; padding:5rem 0 3.5rem 0; border-bottom:1px solid rgba(255,255,255,0.08);">
    <div class="container">
        <div style="display:flex; gap:0.75rem; align-items:center; font-size:0.85rem; color:#94a3b8; margin-bottom:1.5rem;">
            <a href="{{ route('home') }}" style="color:#cbd5e1;">Home</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <a href="{{ route('blogs') }}" style="color:#cbd5e1;">Blogs</a>
            <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i>
            <span style="color:var(--color-primary);">Article</span>
        </div>
        <span class="section-subtitle">{{ $blog->category ?? 'Interior Advice' }}</span>
        <h1 style="font-size:2.85rem; color:#fff; margin-bottom:1.5rem; line-height:1.25;">{{ $blog->title }}</h1>
        <div style="display:flex; gap:1.5rem; color:#94a3b8; font-size:0.9rem;">
            <span><i class="fas fa-user-edit" style="color:var(--color-primary); margin-right:0.4rem;"></i> {{ $blog->author }}</span>
            <span><i class="fas fa-calendar-alt" style="color:var(--color-primary); margin-right:0.4rem;"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Nov 2025' }}</span>
            <span><i class="fas fa-clock" style="color:var(--color-primary); margin-right:0.4rem;"></i> {{ $blog->reading_time }}</span>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="section-padding">
    <div class="container">
        <div style="display:grid; grid-template-columns: 2.2fr 1fr; gap:4rem;">
            <!-- Article Main -->
            <div>
                @if($blog->cover_image)
                    <div style="border-radius:var(--radius-lg); overflow:hidden; margin-bottom:2.5rem; box-shadow:var(--shadow-md);">
                        <img src="{{ asset($blog->cover_image) }}" alt="{{ $blog->title }}" style="width:100%; max-height:500px; object-fit:cover;" onerror="this.src='{{ asset('images/basabo-boys-bedroom-05-1024x768.webp') }}'">
                    </div>
                @endif

                <div style="font-size:1.1rem; line-height:1.85; color:var(--color-text-main); margin-bottom:3rem; white-space:pre-line;">
                    {{ $blog->content }}
                </div>

                <!-- Author Bio Box -->
                <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:2rem; border-radius:var(--radius-md); display:flex; gap:1.5rem; align-items:center;">
                    <div style="width:64px; height:64px; border-radius:50%; background:var(--color-dark); color:var(--color-primary); display:flex; align-items:center; justify-content:center; font-size:1.75rem; flex-shrink:0;">
                        <i class="fas fa-pencil-ruler"></i>
                    </div>
                    <div>
                        <h4 style="font-size:1.15rem; margin-bottom:0.3rem;">DIT Studio Design Editorial</h4>
                        <p style="color:var(--color-text-muted); font-size:0.875rem;">Architects and interior specialists at DIT Studio sharing hands-on project insights, material comparisons, and construction guidelines in Bangladesh.</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <!-- Consultation CTA Box -->
                <div style="background:#0e1013; color:#fff; padding:2rem; border-radius:var(--radius-md); border:1px solid rgba(197,168,128,0.3); margin-bottom:2.5rem;">
                    <h3 style="color:#fff; font-size:1.35rem; margin-bottom:0.75rem;">Planning An Interior?</h3>
                    <p style="color:#94a3b8; font-size:0.875rem; margin-bottom:1.5rem;">Get custom 2D layout planning & transparent BOQ pricing directly from DIT Studio.</p>
                    <button type="button" class="btn btn-primary open-consultation-modal" style="width:100%;">
                        Book Free Consultation
                    </button>
                </div>

                <!-- Recent Articles -->
                <div style="background:var(--color-bg-light); border:1px solid var(--color-border-light); padding:1.75rem; border-radius:var(--radius-md);">
                    <h4 style="font-size:1.15rem; margin-bottom:1.25rem;">More Recent Articles</h4>
                    <div style="display:flex; flex-direction:column; gap:1rem;">
                        @foreach($recentBlogs as $rb)
                            <div style="padding-bottom:1rem; border-bottom:1px solid var(--color-border-light);">
                                <h5 style="font-size:0.95rem; line-height:1.4; margin-bottom:0.3rem;">
                                    <a href="{{ route('blog.detail', $rb->slug) }}">{{ $rb->title }}</a>
                                </h5>
                                <span style="font-size:0.75rem; color:var(--color-text-light);">{{ $rb->reading_time }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
