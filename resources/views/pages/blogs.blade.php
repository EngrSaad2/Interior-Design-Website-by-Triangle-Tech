@extends('layouts.app')

@section('title', 'Interior Design Blogs & Guides – Triangle Interior Design Bangladesh')
@section('meta_description', 'Expert interior design advice, layout tips, material guides, and pricing insights for apartment homeowners in Dhaka and Bangladesh.')

@section('content')
<section style="background:#0e1013; color:#fff; padding:5rem 0 4rem 0;">
    <div class="container" style="text-align:center;">
        <span class="section-subtitle">Insights & Advice</span>
        <h1 style="font-size:3rem; color:#fff; margin-bottom:1rem;">Interior Design Articles</h1>
        <p style="color:#94a3b8; max-width:650px; margin:0 auto; font-size:1.1rem;">
            Practical architectural guides on modular kitchens, wardrobe designs, lighting, and budgeting for Bangladeshi homes.
        </p>

        <!-- Search Form -->
        <form action="{{ route('blogs') }}" method="GET" style="max-width:500px; margin:2rem auto 0 auto; display:flex; gap:0.5rem;">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search articles (e.g. wardrobe, kitchen)..." class="form-control" style="background:#16181d;">
            <button type="submit" class="btn btn-primary" style="padding:0.75rem 1.5rem;"><i class="fas fa-search"></i></button>
        </form>
    </div>
</section>

<section class="section-padding" style="background:var(--color-bg-light);">
    <div class="container">
        <div class="blogs-grid">
            @forelse($blogs as $blog)
                <div class="blog-card">
                    <div class="blog-card-thumb">
                        <img src="{{ asset($blog->cover_image) }}" alt="{{ $blog->title }}" onerror="this.src='{{ asset('images/basabo-boys-bedroom-05-1024x768.webp') }}'">
                    </div>
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <span><i class="fas fa-calendar-alt"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Nov 2025' }}</span>
                            <span><i class="fas fa-clock"></i> {{ $blog->reading_time }}</span>
                        </div>
                        <h2 class="blog-card-title" style="font-size:1.2rem;">
                            <a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                        </h2>
                        <p class="blog-card-excerpt">
                            {{ Str::limit($blog->excerpt ?: $blog->content, 120) }}
                        </p>
                        <a href="{{ route('blog.detail', $blog->slug) }}" style="font-weight:700; font-size:0.875rem; color:var(--color-primary-dark); display:inline-flex; align-items:center; gap:0.4rem;">
                            Read Full Article <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column:1 / -1; text-align:center; padding:4rem;">
                    <h3>No articles found</h3>
                </div>
            @endforelse
        </div>

        <div style="margin-top:3.5rem; display:flex; justify-content:center;">
            {{ $blogs->links() }}
        </div>
    </div>
</section>
@endsection
