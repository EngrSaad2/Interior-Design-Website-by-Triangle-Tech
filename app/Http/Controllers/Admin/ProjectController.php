<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Services\ImageUploadService;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::where('type', 'project')->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'category' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'area_sqft' => 'nullable|string|max:100',
            'completion_year' => 'nullable|string|max:50',
            'client_name' => 'nullable|string|max:100',
            'budget_range' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = $request->only(['title', 'category', 'location', 'area_sqft', 'completion_year', 'client_name', 'budget_range', 'description']);
        $data['slug'] = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = ImageUploadService::uploadAsWebp($request->file('featured_image'), 'project');
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = ImageUploadService::uploadAsWebp($file, 'project_gallery');
            }
            $data['gallery'] = $galleryPaths;
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        $categories = Category::where('type', 'project')->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'category' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'area_sqft' => 'nullable|string|max:100',
            'completion_year' => 'nullable|string|max:50',
            'client_name' => 'nullable|string|max:100',
            'budget_range' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = $request->only(['title', 'category', 'location', 'area_sqft', 'completion_year', 'client_name', 'budget_range', 'description']);
        if ($request->slug) {
            $data['slug'] = Str::slug($request->slug);
        }
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = ImageUploadService::uploadAsWebp($request->file('featured_image'), 'project');
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = is_array($project->gallery) ? $project->gallery : [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = ImageUploadService::uploadAsWebp($file, 'project_gallery');
            }
            $data['gallery'] = $galleryPaths;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}
