<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {

        $product = Product::latest()->filter(
            \request(['search','category'])
        )
            ->paginate(\request()->input('row_length') ?? 10)->withQueryString();
        if ( auth()->user() ){
            if (auth()->user()->can('admin'))
                return view('admin.product-tables',[
                    'products' => $product
                ]);
        }
        return view('products.index', [
            'products' => $product,
            'categories' => []
        ]);

    }
    public function add()
    {
        return view('admin.add-product');
    }

    public function store(Request $request)
    {
        $slug = implode("-", explode(" ",$request->get('name')));
        Product::create(array_merge($this->validateProduct(), [
            'image' => request()->file('image')->store('images'),
            'slug' =>  $slug
        ]));
        return redirect('/product')->with('success', 'Product Added ');
    }

    public function show(Product $product)
    {
        return view('products.show',[
            'product' => $product
        ]);
    }

    public function edit (Product $product ){
        return view('admin.add-product',[
            'productToedit' => $product
        ]);
    }
    public function update( Product $product)
    {
        $attributes = $this->validateProduct($product);
        if ($attributes['image'] ?? false){
            $attributes['image'] = \request()->file('image')->store('images');
        }

        $product->update($attributes);

       return redirect('/product')->with('success' , 'Product Updated ! ');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/product')->with('success', 'Product Deleted!');
    }
    protected function validateProduct(?Product $product = null): array
    {
        $product ??= new Product();
        return request()->validate([
            'image' => $product->exists ? ['image'] : ['required', 'image'],
            'name' => 'required',
            'body' => '',
            'dimensions' => '',
            'price' => '',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
