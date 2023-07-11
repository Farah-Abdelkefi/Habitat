<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {


        return view('products.index', [
            'products' => Product::latest()->filter(
                \request(['search','category'])
            )
                ->paginate(10)->withQueryString(),
            'categories' => []
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'Description' => ['required'],
            'Dimensions' => ['required'],
            'image' => ['required'],
            'Prix' => ['nullable', 'integer'],
        ]);

        return Product::create($request->validated());
    }

    public function show(Product $product)
    {
        return view('products.show',[
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required'],
            'Description' => ['required'],
            'Dimensions' => ['required'],
            'image' => ['required'],
            'Prix' => ['nullable', 'integer'],
        ]);

        $product->update($request->validated());

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}
