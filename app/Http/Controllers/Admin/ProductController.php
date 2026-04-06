<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('sku', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products   = $query->paginate(15)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.inventory', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'old_price'   => 'nullable|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'sku'         => 'nullable|string|max:100|unique:products,sku',
            'image'       => 'nullable|image|max:2048',
            'features'    => 'nullable|string',
            'status'        => 'required|in:active,draft,archived',
            'badge'         => 'nullable|in:hot,new,sale',
            'is_featured'   => 'nullable|boolean',
            'rating'        => 'nullable|numeric|min:0|max:5',
        ]);

        $validated['slug']        = $this->uniqueSlug($validated['name']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['rating']      = $request->input('rating', 0);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('admin.inventory')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'old_price'   => 'nullable|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'sku'         => 'nullable|string|max:100|unique:products,sku,' . $product->id,
            'image'       => 'nullable|image|max:2048',
            'features'    => 'nullable|string',
            'status'        => 'required|in:active,draft,archived',
            'badge'         => 'nullable|in:hot,new,sale',
            'is_featured'   => 'nullable|boolean',
            'rating'        => 'nullable|numeric|min:0|max:5',
        ]);

        $validated['slug']        = $this->uniqueSlug($validated['name'], $product->id);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['rating']      = $request->input('rating', 0);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.inventory')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.inventory')->with('success', 'Product deleted.');
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug  = Str::slug($name);
        $query = Product::where('slug', $slug);
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }
        if ($query->exists()) {
            $slug = $slug . '-' . time();
        }
        return $slug;
    }
}
