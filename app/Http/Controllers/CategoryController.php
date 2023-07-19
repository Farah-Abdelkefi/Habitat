<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('admin.category-table',[
            'categories' => Category::latest()->filter(
                \request(['search'])
            )
                ->paginate(\request(['row_length'][0]))->withQueryString()
        ]);
    }

    public function store(Request $request)
    {
        $slug = implode("-", explode(" ",$request->get('name')));
        Category::create(array_merge($this->validateCategory(), [
            'slug' =>  $slug
        ]));
        return redirect("/category")->with('success', 'Category Added ');
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
    public function edit (Category $category ){
        return redirect("/category")->with(
            'categoryToedit' , $category
        );
    }
    public function update( Category $category)
    {
        $attributes = $this->validateCategory($category);


        $category->update($attributes);

        return redirect("/category")->with('success' , 'Category Updated ! ');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect("/category")->with('success', 'Category Deleted!');
    }
    protected function validateCategory (?Category $category = null): array
    {
        $category ??= new Category();
        return request()->validate([
            'name' => 'required',
            'category_id' => ['nullable', Rule::exists('categories', 'id')]
        ]);
    }
}
