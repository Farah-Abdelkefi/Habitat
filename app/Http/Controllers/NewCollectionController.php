<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variables;

class NewCollectionController extends Controller
{
    public function index()
    {
            return view('admin.collection',[
                'categories' => Category::all(),
                'collectionTitle' => Variables::firstWhere('name','collection_title'),
                'collection_img' => Variables::firstWhere('name','collection_img'),
            ]);
    }
    public function update (Request $request)
    {

        if ( count($request->input('multiselect5')) != 0)
        {
            $existing_old = Product::where('new_arrival_product','=','1')->get()->pluck('id')->all();
            $input_old = array_filter($request->input('multiselect5'), function ($item ){
                $new_products = Product::where('new_arrival_product','=','1')->get();
                return $new_products->contains('id','',$item);
            });
            $olds = array_diff($existing_old,$input_old);
            $news =array_diff($request->input('multiselect5'),$input_old);
            foreach ($olds as $old_id) {
                $old = Product::firstWhere('id','=',$old_id);
                $old->update(['new_arrival_product'=> 0]);
            }
            foreach ($news as $new_id){
                $new = Product::firstWhere('id','=',$new_id);
                $new->update(['new_arrival_product'=> 1]);
            }
        }
        if ($request->input('value') != null ){
            $variable = Variables::firstWhere('id',$request->input('id'));
            $att = request()->validate([
                'name' =>'required',
                'value' => 'required'
            ]);
            $variable->update($att);
        }
        if ($request->file('collection_img_value') != null ){

            $variable = Variables::firstWhere('id',$request->input('collection_img_id'));

            $att = request()->validate([
                'collection_img_name' =>'required',
                'collection_img_value' =>  ['image','required'],
            ]);
            $var = ['name' => $att['collection_img_name']];

            $var['value'] = request()->file('collection_img_value')->store('images');
            $variable->update($var);
        }
            return redirect('/collection')->with('succes' ,'Product Updated ! ');
    }
}
