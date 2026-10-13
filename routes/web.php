<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InteriorController;

Route::get('/', [InteriorController::class, 'index'])->name('home');

// Services
Route::get('/services', [InteriorController::class, 'services'])->name('services');
Route::get('/services/{slug}', [InteriorController::class, 'serviceDetail'])->name('service.detail');

// Projects
Route::get('/projects', [InteriorController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [InteriorController::class, 'projectDetail'])->name('project.detail');
Route::get('/project-hubs/{slug}', [InteriorController::class, 'projectHub'])->name('project.hub');

// Why Choose Us & About
Route::get('/why-choose-dit', [InteriorController::class, 'whyChooseDit'])->name('why.choose');
Route::get('/about-us', [InteriorController::class, 'aboutUs'])->name('about');

// Shop
Route::get('/shop', [InteriorController::class, 'shop'])->name('shop');
Route::get('/shop/{slug}', [InteriorController::class, 'productDetail'])->name('product.detail');
Route::get('/cart', [InteriorController::class, 'cart'])->name('cart');
Route::get('/checkout', [InteriorController::class, 'checkout'])->name('checkout');

// Blogs
Route::get('/blogs', [InteriorController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [InteriorController::class, 'blogDetail'])->name('blog.detail');

// FAQs & Contact
Route::get('/faqs', [InteriorController::class, 'faqs'])->name('faqs');
Route::get('/contact', [InteriorController::class, 'contact'])->name('contact');

// Inquiries / Consultation
Route::post('/inquiry', [InteriorController::class, 'inquirySubmit'])->name('inquiry.submit');

// Area Landing Pages (e.g. /best-interior-design-company-in-gulshan)
Route::get('/best-interior-design-company-in-{area}', [InteriorController::class, 'areaPage'])->name('area.landing');

// Catch-all for blog slugs like /sliding-vs-hinged-wardrobe-doors/
Route::get('/{slug}', function($slug) {
    $blog = \App\Models\BlogPost::where('slug', $slug)->first();
    if ($blog) {
        return app(InteriorController::class)->blogDetail($slug);
    }
    abort(404);
});
