{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd">
    <!-- Homepage -->
    <url>
        <loc>{{ route('home') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
        <image:image>
            <image:loc>{{ asset('images/banner-1.webp') }}</image:loc>
            <image:title>Interior Design Website - Triangle Interior Design Bangladesh</image:title>
            <image:caption>Best Interior Design Website and luxury turnkey firm in Bangladesh</image:caption>
        </image:image>
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

    <!-- Interior Design Services -->
    @foreach($services as $service)
    <url>
        <loc>{{ route('service.detail', $service->slug) }}</loc>
        <lastmod>{{ $service->updated_at ? $service->updated_at->format('Y-m-d') : date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
        @if(!empty($service->image))
        <image:image>
            <image:loc>{{ asset($service->image) }}</image:loc>
            <image:title>{{ $service->name }} - Interior Design Website</image:title>
        </image:image>
        @endif
    </url>
    @endforeach

    <!-- Project Hubs -->
    @foreach($projectHubs as $hub)
    <url>
        <loc>{{ route('project.hub', $hub) }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.85</priority>
    </url>
    @endforeach

    <!-- Portfolio Projects with Google Image Schema -->
    @foreach($projects as $project)
    <url>
        <loc>{{ route('project.detail', $project->slug) }}</loc>
        <lastmod>{{ $project->updated_at ? $project->updated_at->format('Y-m-d') : date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.85</priority>
        @if(!empty($project->image))
        <image:image>
            <image:loc>{{ asset($project->image) }}</image:loc>
            <image:title>{{ $project->title }} - Interior Design Website</image:title>
            <image:caption>{{ $project->subtitle ?? $project->title }}</image:caption>
        </image:image>
        @endif
    </url>
    @endforeach

    <!-- Products -->
    @foreach($products as $product)
    <url>
        <loc>{{ route('product.detail', $product->slug) }}</loc>
        <lastmod>{{ $product->updated_at ? $product->updated_at->format('Y-m-d') : date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.75</priority>
        @if(!empty($product->image))
        <image:image>
            <image:loc>{{ asset($product->image) }}</image:loc>
            <image:title>{{ $product->name }} - Custom Furniture</image:title>
        </image:image>
        @endif
    </url>
    @endforeach

    <!-- Blog Posts -->
    @foreach($blogs as $blog)
    <url>
        <loc>{{ route('blog.detail', $blog->slug) }}</loc>
        <lastmod>{{ $blog->updated_at ? $blog->updated_at->format('Y-m-d') : date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
        @if(!empty($blog->image))
        <image:image>
            <image:loc>{{ asset($blog->image) }}</image:loc>
            <image:title>{{ $blog->title }}</image:title>
        </image:image>
        @endif
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
