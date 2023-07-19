<?php

namespace App\Http\Controllers;

use App\Models\Product;

class NewCollectionController extends Controller
{
    public function index()
    {
        if (request()->getRequestUri() == "/collection")
            return view('admin.collection',[
            'newproducts' => Product::paginate(10)
            ]);
        else
            return view('admin.reference',[
                'referencedproducts' => Product::paginate(10)
            ]);
    }
    public function update (Product $product)
    {
        if (request()->getRequestUri() == "/collection/edit/".$product->id )
        {
            if (! request()->new_arrival_product)
                $att['new_arrival_product'] = 0;
            else
                $att = request()->validate([
                    'new_arrival_product' => 'required'
                ]);

            $product->update($att);
            return redirect('/collection')->with('succes' ,'Product Updated ! ');
        }
        else {
            if (! request()->referenced_product)
                $att['referenced_product'] = 0;
            else
                $att = request()->validate([
                    'referenced_product' => 'required'
                ]);

            $product->update($att);
            return redirect('/reference')->with('succes' ,'Product Updated ! ');
        }


    }
}
