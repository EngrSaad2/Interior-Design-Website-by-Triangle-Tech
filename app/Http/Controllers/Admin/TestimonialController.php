<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Services\ImageUploadService;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:100',
            'client_title' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'project_name' => 'nullable|string|max:150',
            'comment' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only(['client_name', 'client_title', 'location', 'rating', 'project_name', 'comment']);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = ImageUploadService::uploadAsWebp($request->file('avatar'), 'client');
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'client_name' => 'required|string|max:100',
            'client_title' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'project_name' => 'nullable|string|max:150',
            'comment' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only(['client_name', 'client_title', 'location', 'rating', 'project_name', 'comment']);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = ImageUploadService::uploadAsWebp($request->file('avatar'), 'client');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully!');
    }
}
