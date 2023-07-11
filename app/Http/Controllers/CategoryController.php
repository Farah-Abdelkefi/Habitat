<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('Products.index',[

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
        ]);

        return Category::create($request->validated());
    }

    public function show(Category $category)
    {
        $products = Product::whereHas('category', fn ($query) =>
        $query->where('slug', $category->slug)
        )->paginate(10)->withQueryString();
        return view('Products.index',[
            'categories' => $category->kids(),
            'products' => $products
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
        ]);

        $category->update($request->validated());

        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json();
    }
}
