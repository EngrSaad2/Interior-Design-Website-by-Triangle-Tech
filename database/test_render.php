<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

try {
    $out = view('pages.home', [
        'settings' => [],
        'services' => \App\Models\Service::all(),
        'featuredProjects' => \App\Models\Project::take(6)->get(),
        'latestProjects' => \App\Models\Project::take(8)->get(),
        'products' => \App\Models\Product::take(4)->get(),
        'testimonials' => \App\Models\Testimonial::all(),
        'blogs' => \App\Models\BlogPost::take(3)->get(),
        'faqs' => \App\Models\Faq::take(8)->get(),
    ])->render();
    echo "Render SUCCESSFUL! Output length: " . strlen($out) . "\n";
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " Line: " . $e->getLine() . "\n";
}
