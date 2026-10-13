<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Project;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Inquiry;
use App\Models\SiteSetting;
use App\Models\Slider;

class InteriorController extends Controller
{
    protected function getSettings()
    {
        return SiteSetting::all()->pluck('value', 'key')->toArray();
    }

    public function index()
    {
        $settings = $this->getSettings();
        $sliders = Slider::where('is_active', true)->orderBy('sort_order')->get();
        $services = Service::where('is_active', true)->orderBy('sort_order')->take(8)->get();
        $featuredProjects = Project::where('is_featured', true)->take(6)->get();
        if ($featuredProjects->isEmpty()) {
            $featuredProjects = Project::take(6)->get();
        }
        $latestProjects = Project::latest()->take(8)->get();
        $products = Product::where('is_featured', true)->take(4)->get();
        $testimonials = Testimonial::all();
        $blogs = BlogPost::latest()->take(3)->get();
        $faqs = Faq::take(8)->get();

        return view('pages.home', compact(
            'settings',
            'sliders',
            'services',
            'featuredProjects',
            'latestProjects',
            'products',
            'testimonials',
            'blogs',
            'faqs'
        ));
    }

    public function services()
    {
        $settings = $this->getSettings();
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('pages.services', compact('settings', 'services'));
    }

    public function serviceDetail($slug)
    {
        $settings = $this->getSettings();
        $service = Service::where('slug', $slug)->firstOrFail();
        $allServices = Service::where('is_active', true)->where('id', '!=', $service->id)->get();
        $relatedProjects = Project::where('category', 'like', '%' . explode('-', $slug)[0] . '%')->take(4)->get();
        if ($relatedProjects->isEmpty()) {
            $relatedProjects = Project::inRandomOrder()->take(4)->get();
        }
        $faqs = Faq::take(6)->get();

        return view('pages.service-detail', compact('settings', 'service', 'allServices', 'relatedProjects', 'faqs'));
    }

    public function projects(Request $request)
    {
        $settings = $this->getSettings();
        $query = Project::query();

        $selectedCategory = $request->get('category');
        if ($selectedCategory && $selectedCategory !== 'all') {
            $query->where('category', 'like', '%' . str_replace('-', ' ', $selectedCategory) . '%');
        }

        if ($request->filled('q')) {
            $search = $request->get('q');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $projects = $query->paginate(12)->withQueryString();
        $categories = Category::where('type', 'project')->get();

        return view('pages.projects', compact('settings', 'projects', 'categories', 'selectedCategory'));
    }

    public function projectHub($slug)
    {
        $settings = $this->getSettings();
        $category = Category::where('slug', $slug)->first();
        $categoryName = $category ? $category->name : ucwords(str_replace('-', ' ', $slug));
        
        $searchTerm = str_ireplace(['interior design projects bangladesh', 'projects bangladesh', 'projects'], '', $categoryName);
        $searchTerm = trim($searchTerm);

        $projects = Project::where('title', 'like', "%{$searchTerm}%")
            ->orWhere('category', 'like', "%{$searchTerm}%")
            ->paginate(12);

        if ($projects->isEmpty()) {
            $projects = Project::paginate(12);
        }

        return view('pages.project-hub', compact('settings', 'categoryName', 'slug', 'projects'));
    }

    public function projectDetail($slug)
    {
        $settings = $this->getSettings();
        $project = Project::where('slug', $slug)->firstOrFail();
        $project->increment('views_count');

        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('category', $project->category)
            ->take(3)
            ->get();
        if ($relatedProjects->isEmpty()) {
            $relatedProjects = Project::where('id', '!=', $project->id)->inRandomOrder()->take(3)->get();
        }

        return view('pages.project-detail', compact('settings', 'project', 'relatedProjects'));
    }

    public function whyChooseDit()
    {
        $settings = $this->getSettings();
        $testimonials = Testimonial::all();
        $faqs = Faq::take(6)->get();
        return view('pages.why-choose-dit', compact('settings', 'testimonials', 'faqs'));
    }

    public function shop(Request $request)
    {
        $settings = $this->getSettings();
        $query = Product::query();

        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->get('q') . '%');
        }

        $products = $query->paginate(12);
        return view('pages.shop', compact('settings', 'products'));
    }

    public function productDetail($slug)
    {
        $settings = $this->getSettings();
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('id', '!=', $product->id)->take(4)->get();
        return view('pages.product-detail', compact('settings', 'product', 'relatedProducts'));
    }

    public function cart()
    {
        $settings = $this->getSettings();
        return view('pages.cart', compact('settings'));
    }

    public function checkout()
    {
        $settings = $this->getSettings();
        return view('pages.checkout', compact('settings'));
    }

    public function blogs(Request $request)
    {
        $settings = $this->getSettings();
        $query = BlogPost::latest();

        if ($request->filled('q')) {
            $search = $request->get('q');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $blogs = $query->paginate(9)->withQueryString();
        $recentBlogs = BlogPost::latest()->take(5)->get();
        return view('pages.blogs', compact('settings', 'blogs', 'recentBlogs'));
    }

    public function blogDetail($slug)
    {
        $settings = $this->getSettings();
        $blog = BlogPost::where('slug', $slug)->firstOrFail();
        $recentBlogs = BlogPost::where('id', '!=', $blog->id)->latest()->take(4)->get();
        return view('pages.blog-detail', compact('settings', 'blog', 'recentBlogs'));
    }

    public function faqs()
    {
        $settings = $this->getSettings();
        $faqs = Faq::orderBy('sort_order')->get();
        return view('pages.faqs', compact('settings', 'faqs'));
    }

    public function contact()
    {
        $settings = $this->getSettings();
        return view('pages.contact', compact('settings'));
    }

    public function aboutUs()
    {
        $settings = $this->getSettings();
        $testimonials = Testimonial::all();
        return view('pages.about-us', compact('settings', 'testimonials'));
    }

    public function areaPage($area)
    {
        $settings = $this->getSettings();
        $formattedArea = ucwords(str_replace('-', ' ', $area));
        $projects = Project::where('location', 'like', "%{$formattedArea}%")->take(6)->get();
        if ($projects->isEmpty()) {
            $projects = Project::inRandomOrder()->take(6)->get();
        }
        $faqs = Faq::take(6)->get();
        return view('pages.area-landing', compact('settings', 'formattedArea', 'area', 'projects', 'faqs'));
    }

    public function inquirySubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:25',
            'email' => 'nullable|email|max:100',
            'message' => 'nullable|string',
        ]);

        Inquiry::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'location' => $request->location,
            'service_type' => $request->service_type,
            'estimated_sqft' => $request->estimated_sqft,
            'budget' => $request->budget,
            'message' => $request->message,
            'status' => 'new'
        ]);

        return back()->with('success', 'Thank you! Your consultation request has been received. Our senior architect will call you shortly.');
    }

    public function sitemap()
    {
        $services = Service::where('is_active', true)->get();
        $projects = Project::all();
        $blogs = BlogPost::all();
        $products = Product::all();

        $projectHubs = [
            'bedroom-interior-design-projects-bangladesh',
            'master-bedroom-interior-design-projects-bangladesh',
            'kids-bedroom-interior-design-projects-bangladesh',
            'guest-bedroom-interior-design-projects-bangladesh',
            'living-room-interior-design-projects-bangladesh',
            'dining-room-interior-design-projects-bangladesh',
            'kitchen-interior-design-projects-bangladesh',
            'modular-kitchen-projects-bangladesh',
            'open-kitchen-design-projects-bangladesh',
            'common-area-interior-design-projects-bangladesh',
            'cabinet-design-projects-bangladesh',
            'luxury-interior-design-projects',
            'modern-interior-design-projects',
            'closet-design-projects-bangladesh',
        ];

        $areas = [
            'gulshan',
            'banani',
            'dhanmondi',
            'uttara',
            'bashundhara',
            'baridhara',
            'mirpur',
            'chittagong',
            'sylhet',
        ];

        return response()->view('pages.sitemap', compact(
            'services',
            'projects',
            'blogs',
            'products',
            'projectHubs',
            'areas'
        ))->header('Content-Type', 'application/xml');
    }
}

