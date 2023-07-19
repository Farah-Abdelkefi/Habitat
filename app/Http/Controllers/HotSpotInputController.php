<?php

namespace App\Http\Controllers;

use App\Models\HotSpotInput;
use App\Models\Variables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HotSpotInputController extends Controller
{
    public function index()
    {

        if (\request()->getRequestUri() == "/hotspot")
            return view('admin.hotspot_input',[
            'input' => HotSpotInput::all(),
            'hotspot_img' => Variables::firstWhere('name','hotspot_img')
            ]);

        else
            return view('admin.edit-hotspot',[
                'hotspot' => "",
                'hotspot_img' => Variables::firstWhere('name','hotspot_img')
                ]);

    }

    public function store(Request $request)
    {
        $att = $request->validate([
            'input_left' => ['required'],
            'input_top'=>['required'],
            'content_left' => ['required'],
            'content_top' => ['required'],
            'label_top' => ['required'],
            'label_left' => ['required'],
            'product_id' => ['required', Rule::exists('products', 'id')]
        ]);

        $hp = HotSpotInput::create($att);
        return redirect('/hotspot/edit/'.$hp->id);
    }

    public function show(HotSpotInput $hotSpotInput)
    {
        return $hotSpotInput;
    }

    public function edit (HotSpotInput $hotSpotInput){
        return view('admin.edit-hotspot',[
            'hotspot' => $hotSpotInput,
            'hotspot_img' => Variables::firstWhere('name','hotspot_img')
        ]);
    }
    public function update(Request $request, HotSpotInput $hotSpotInput)
    {

        $att = $request->validate([
            'input_left' => ['required'],
            'input_top'=>['required'],
            'content_left' => ['required'],
            'content_top' => ['required'],
            'label_top' => ['required'],
            'label_left' => ['required'],
            'product_id' => ['required', Rule::exists('products', 'id')]
        ]);

        $hotSpotInput->update($att);

        return redirect('/hotspot')->with('success','hotspot Updated');
    }

    public function destroy(HotSpotInput $hotSpotInput)
    {
        $hotSpotInput->delete();
        return back()->with('success','deleted');
    }
}
