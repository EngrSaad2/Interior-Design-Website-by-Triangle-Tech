<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Services\ImageUploadService;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'icon' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order' => 'integer',
        ]);

        $data = $request->only(['title', 'icon', 'excerpt', 'description', 'sort_order']);
        $data['slug'] = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = ImageUploadService::uploadAsWebp($request->file('featured_image'), 'service');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'icon' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order' => 'integer',
        ]);

        $data = $request->only(['title', 'icon', 'excerpt', 'description', 'sort_order']);
        if ($request->slug) {
            $data['slug'] = Str::slug($request->slug);
        }
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = ImageUploadService::uploadAsWebp($request->file('featured_image'), 'service');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }
}
