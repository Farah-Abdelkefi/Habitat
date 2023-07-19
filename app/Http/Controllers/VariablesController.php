<?php

namespace App\Http\Controllers;

use App\Models\Variables;
use Illuminate\Http\Request;

class VariablesController extends Controller
{
    public function index()
    {
        if (\request()->getRequestUri() == "/about")
            return view('admin.about', [
                'about' => Variables::firstWhere('name', 'about'),
                'about_img' => Variables::firstWhere('name', 'about_img'),
            ]);
        elseif (\request()->getRequestUri() == "/logo" || \request()->getRequestUri() == "/logo/add" )
            return view('admin.logo', [
                'logos' => Variables::where('name', 'like', '%logo%')->get()
            ]);
        else
            return view('admin.instagram',[
                'insta_imgs' => Variables::where('name','like','%insta_img%')->get()
            ]);


    }


    public function store(Request $request)
    {
        $att = $this->validateVar();

        $att['value'] = $att['value']->store('logos');

        Variables::create($att);
        return redirect('/logo')->with('success','Logo Added');
    }

    public function show(Variables $variables)
    {
        return $variables;
    }

    public function update(Variables $variables)
    {
        $att = $this->validateVar($variables);
        ///ddd(\request() , $att);
        if (str_contains(request()->get('name') , 'img')){
            $att['value'] = request()->file('value')->store('images');
        }
        $variables->update($att);

        return back()->with('success' , ' Updated ! ');
    }

    public function destroy(Variables $variables)
    {
        $variables->delete();
        return redirect('/logo')->with('success','Deleted ! ');
    }
    protected function validateVar (?Variables $variables = null):array
    {
        $variables ??= new Variables();
        return request()->validate([
            'name' =>'required',
            'value' => (str_contains($variables->name , 'img') || str_contains($variables->name , 'logo')) ? ['image','required'] : ['required'],
        ]);
    }
}
