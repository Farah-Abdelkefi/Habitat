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
            return view('admin.Partenaire', [
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

    public function update(Request $request , ?Variables $variables = null)
    {
       // $att = $this->validateVar($variables);
        //ddd( $request->all());
        if ($request->get('value') != null){
            $variable = Variables::firstWhere('id',$request->get('id'));
            //ddd($variables);
            $att = request()->validate([
                'about_name' =>'required',
                'about_value' => 'required'
            ]);
            $var = ['name' => $att['about_name'],'value' => $att['about_value'] ];
            $variable->update($var);
        }
        if ($request->file('about_img_value') != null ){

            $variable = Variables::firstWhere('id',$request->get('about_img_id'));

            $att = request()->validate([
                'about_img_name' =>'required',
                'about_img_value' =>  ['image','required'],
            ]);
            $var = ['name' => $att['about_img_name']];

            $var['value'] = request()->file('about_img_value')->store('images');
            $variable->update($var);
        }
        for ($i = 1 ; $i <= 4 ; $i++){
            if ($request->file('insta_img_value'.$i) != null ){
                $variable = Variables::firstWhere('id',$request->get('id'.$i));

                $att = request()->validate([
                    'name'.$i =>'required',
                    'insta_img_value'.$i =>  ['required','image'],
                ]);
                $var = ['name' => $att['name'.$i ]];
                $var['value'] = request()->file('insta_img_value'.$i)->store('images');
                $variable->update($var);
            }
        }
        if ($variables) {
            $att = $this->validateVar($variables);
            ///ddd(\request() , $att);
            if (str_contains(request()->get('name') , 'img')){
                $att['value'] = request()->file('value')->store('images');
            }
            $variables->update($att);

        }

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
