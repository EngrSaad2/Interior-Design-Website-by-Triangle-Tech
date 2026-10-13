<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\Inquiry;
use App\Models\Testimonial;
use App\Models\Slider;
use App\Models\Faq;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'products' => Product::count(),
            'blogs' => BlogPost::count(),
            'inquiries' => Inquiry::count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
            'testimonials' => Testimonial::count(),
            'sliders' => Slider::count(),
            'faqs' => Faq::count(),
        ];

        $recentInquiries = Inquiry::latest()->take(6)->get();
        $recentProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentProjects'));
    }
}
