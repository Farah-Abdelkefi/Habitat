<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Variables;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function index (){

        if( auth()->user())
            if(auth()->user()->can('admin'))
                return view('admin.index');
        return view('welcome',[
            'about' => Variables::firstWhere('name','about'),
            'about_img' => Variables::firstWhere('name','about_img'),
            'logos' => Variables::where('name', 'like', '%logo%')->get(),
            'insta_imgs' => Variables::where('name', 'like', '%insta_img%')->get(),
            'categories' => Category::all(),
            'referenced_products' => Product::where('referenced_product','1')->get()
        ]);
    }
    public function create()
    {

        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
