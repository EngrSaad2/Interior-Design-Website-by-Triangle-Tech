<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('sort_order')->paginate(20);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:100',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'sort_order' => 'integer',
        ]);

        Faq::create($request->only(['category', 'question', 'answer', 'sort_order']));

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ added successfully!');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'category' => 'required|string|max:100',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'sort_order' => 'integer',
        ]);

        $faq->update($request->only(['category', 'question', 'answer', 'sort_order']));

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully!');
    }
}
