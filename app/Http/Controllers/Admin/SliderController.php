<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Services\ImageUploadService;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort_order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'highlight_word' => 'nullable|string|max:100',
            'subtitle' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'catalogue_url' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order' => 'integer',
        ]);

        $data = $request->only(['title', 'highlight_word', 'subtitle', 'button_text', 'button_url', 'catalogue_url', 'sort_order']);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $data['image'] = ImageUploadService::uploadAsWebp($request->file('image'), 'banner');
        }

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Hero slide created successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'highlight_word' => 'nullable|string|max:100',
            'subtitle' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'catalogue_url' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order' => 'integer',
        ]);

        $data = $request->only(['title', 'highlight_word', 'subtitle', 'button_text', 'button_url', 'catalogue_url', 'sort_order']);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = ImageUploadService::uploadAsWebp($request->file('image'), 'banner');
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Hero slide updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Hero slide deleted successfully!');
    }
}
