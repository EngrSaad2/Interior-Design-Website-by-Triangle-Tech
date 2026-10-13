{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!-- Homepage -->
    <url>
        <loc>{{ route('home') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- Main Navigation Pages -->
    <url>
        <loc>{{ route('services') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('projects') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('why.choose') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('about') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('shop') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>{{ route('blogs') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('faqs') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.85</priority>
    </url>

    <!-- 10 Interior Design Services -->
    @foreach($services as $service)
    <url>
        <loc>{{ route('service.detail', $service->slug) }}</loc>
        <lastmod>{{ $service->updated_at ? $service->updated_at->format('Y-m-d') : date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @endforeach

    <!-- 14 Project Hubs -->
    @foreach($projectHubs as $hub)
    <url>
        <loc>{{ route('project.hub', $hub) }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.85</priority>
    </url>
    @endforeach

    <!-- Portfolio Projects -->
    @foreach($projects as $project)
    <url>
        <loc>{{ route('project.detail', $project->slug) }}</loc>
        <lastmod>{{ $project->updated_at ? $project->updated_at->format('Y-m-d') : date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    <!-- Products -->
    @foreach($products as $product)
    <url>
        <loc>{{ route('product.detail', $product->slug) }}</loc>
        <lastmod>{{ $product->updated_at ? $product->updated_at->format('Y-m-d') : date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.75</priority>
    </url>
    @endforeach

    <!-- Blog Posts -->
    @foreach($blogs as $blog)
    <url>
        <loc>{{ route('blog.detail', $blog->slug) }}</loc>
        <lastmod>{{ $blog->updated_at ? $blog->updated_at->format('Y-m-d') : date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    <!-- Area Landing Pages for Local SEO -->
    @foreach($areas as $area)
    <url>
        <loc>{{ route('area.landing', $area) }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>
