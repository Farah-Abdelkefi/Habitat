<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReferenceController extends Controller
{
    public function index()
    {
        return view('admin.reference',[
            'references' => Reference::all(),
        ])
       ;
    }

    public function store(Request $request)
    {
        //ddd($request, $request->file('image'));

        $att = $request->validate([
            'name' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $att['image'] = request()->file('image')->store('images');

        $products = $request->validate([
            'multiselect5' => [Rule::exists('products', 'id')]
        ]);

        // ddd($att,$products);
        $ref =  Reference::create($att);
        // ddd($ref);
        $ref->products()->sync($products['multiselect5']);
        return redirect('/reference')->with('success','Referenece added !');
    }

    public function add()
    {
        return view('admin.add-reference');
    }

    public function edit (Reference $reference ){
        return view('admin.add-reference',[
            'refToedit' => $reference
        ]);
    }

    public function update(Request $request, Reference $reference)
    {
        $att = $request->validate([
            'name' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        if( $request->file('image') )
            $att['image'] = request()->file('image')->store('images');
        $reference->update($att);
        $products = $request->validate([
            'multiselect5' => [Rule::exists('products', 'id')]
        ]);
        $reference->products()->sync($products['multiselect5']);

        return redirect('/reference')->with('success','Referenece updated !');;
    }

    public function destroy(Reference $reference)
    {
        $prods = $reference->products ;
        foreach ($prods as $prod) {
            $prod->pivot->delete();
        }
        $reference->delete();
        return redirect('/reference')->with('success', 'Reference Deleted! ');
    }
}
