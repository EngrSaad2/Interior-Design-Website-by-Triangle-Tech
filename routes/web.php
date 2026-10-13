<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InteriorController;
use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\SliderController as AdminSlider;
use App\Http\Controllers\Admin\ServiceController as AdminService;
use App\Http\Controllers\Admin\ProjectController as AdminProject;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\BlogPostController as AdminBlogPost;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonial;
use App\Http\Controllers\Admin\FaqController as AdminFaq;
use App\Http\Controllers\Admin\InquiryController as AdminInquiry;
use App\Http\Controllers\Admin\SettingController as AdminSetting;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;
use App\Http\Controllers\Admin\DatabaseBackupController as AdminBackup;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
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

// Inquiries / Consultation Submit
Route::post('/inquiry', [InteriorController::class, 'inquirySubmit'])->name('inquiry.submit');
Route::post('/contact', [InteriorController::class, 'inquirySubmit'])->name('contact.submit');

// Area Landing Pages (e.g. /best-interior-design-company-in-gulshan)
Route::get('/best-interior-design-company-in-{area}', [InteriorController::class, 'areaPage'])->name('area.landing');

// SEO XML Sitemap
Route::get('/sitemap.xml', [InteriorController::class, 'sitemap'])->name('sitemap');

// Shortcut for Login
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');

/*
|--------------------------------------------------------------------------
| Admin CMS Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuth::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuth::class, 'login'])->name('login.submit');
    Route::post('logout', [AdminAuth::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Protected Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard.redirect');

        // Hero Sliders
        Route::resource('sliders', AdminSlider::class)->except(['show']);

        // Services & Projects
        Route::resource('services', AdminService::class)->except(['show']);
        Route::resource('projects', AdminProject::class)->except(['show']);

        // Products & Categories
        Route::resource('products', AdminProduct::class)->except(['show']);
        Route::resource('categories', AdminCategory::class)->except(['show']);

        // Blog Posts
        Route::resource('blogs', AdminBlogPost::class)->except(['show']);

        // Testimonials & FAQs
        Route::resource('testimonials', AdminTestimonial::class)->except(['show']);
        Route::resource('faqs', AdminFaq::class)->except(['show']);

        // Inquiries & Leads
        Route::get('inquiries', [AdminInquiry::class, 'index'])->name('inquiries.index');
        Route::get('inquiries/{inquiry}', [AdminInquiry::class, 'show'])->name('inquiries.show');
        Route::post('inquiries/{inquiry}/read', [AdminInquiry::class, 'markAsRead'])->name('inquiries.read');
        Route::post('inquiries/{inquiry}/status', [AdminInquiry::class, 'updateStatus'])->name('inquiries.status');
        Route::delete('inquiries/{inquiry}', [AdminInquiry::class, 'destroy'])->name('inquiries.destroy');

        // Settings & Branding
        Route::get('settings', [AdminSetting::class, 'index'])->name('settings.index');
        Route::post('settings', [AdminSetting::class, 'update'])->name('settings.update');

        // Profile & Security Credentials
        Route::get('profile', [AdminProfile::class, 'index'])->name('profile');
        Route::post('profile', [AdminProfile::class, 'updateProfile'])->name('profile.update');
        Route::post('profile/password', [AdminProfile::class, 'updatePassword'])->name('profile.password');

        // Database Backup & Restore
        Route::get('database-backup', [AdminBackup::class, 'index'])->name('backup.index');
        Route::post('database-backup/create', [AdminBackup::class, 'backup'])->name('backup.create');
        Route::get('database-backup/download', [AdminBackup::class, 'download'])->name('backup.download');
        Route::post('database-backup/restore', [AdminBackup::class, 'restore'])->name('backup.restore');
        Route::post('database-backup/upload', [AdminBackup::class, 'upload'])->name('backup.upload');
    });
});

// Dynamic Blog Slug Catch-All
Route::get('/{slug}', function ($slug) {
    $blog = \App\Models\BlogPost::where('slug', $slug)->first();
    if ($blog) {
        return app(InteriorController::class)->blogDetail($slug);
    }
    abort(404);
});
