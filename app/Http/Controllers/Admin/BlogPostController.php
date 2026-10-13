<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Services\ImageUploadService;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->paginate(15);
        return view('admin.blogs.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'author' => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'reading_time' => 'nullable|string|max:50',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = $request->only(['title', 'author', 'category', 'reading_time', 'excerpt', 'content']);
        $data['slug'] = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $data['published_at'] = $request->published_at ? now() : null;

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = ImageUploadService::uploadAsWebp($request->file('cover_image'), 'blog');
        }

        BlogPost::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post published successfully!');
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $blog->id,
            'author' => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'reading_time' => 'nullable|string|max:50',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = $request->only(['title', 'author', 'category', 'reading_time', 'excerpt', 'content']);
        if ($request->slug) {
            $data['slug'] = Str::slug($request->slug);
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = ImageUploadService::uploadAsWebp($request->file('cover_image'), 'blog');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully!');
    }
}
