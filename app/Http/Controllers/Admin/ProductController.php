<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Services\ImageUploadService;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('type', 'product')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'category' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'price_text' => 'nullable|string|max:100',
            'sale_price' => 'nullable|numeric|min:0',
            'sku' => 'nullable|string|max:100',
            'stock_status' => 'required|string|in:in_stock,out_of_stock,made_to_order',
            'dimensions' => 'nullable|string|max:100',
            'material' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = $request->only(['title', 'category', 'price', 'price_text', 'sale_price', 'sku', 'stock_status', 'dimensions', 'material', 'short_description', 'description']);
        $data['slug'] = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = ImageUploadService::uploadAsWebp($request->file('image'), 'product');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('type', 'product')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'category' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'price_text' => 'nullable|string|max:100',
            'sale_price' => 'nullable|numeric|min:0',
            'sku' => 'nullable|string|max:100',
            'stock_status' => 'required|string|in:in_stock,out_of_stock,made_to_order',
            'dimensions' => 'nullable|string|max:100',
            'material' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = $request->only(['title', 'category', 'price', 'price_text', 'sale_price', 'sku', 'stock_status', 'dimensions', 'material', 'short_description', 'description']);
        if ($request->slug) {
            $data['slug'] = Str::slug($request->slug);
        }
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = ImageUploadService::uploadAsWebp($request->file('image'), 'product');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
