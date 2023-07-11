<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        if(auth()->user()) {
            \Cart::session(auth()->user()->id);
        }
    $cartItems = \Cart::getContent();
    //dd($cartItems);
    return view('cart.cart',[
        'cartItems'=> $cartItems
    ]);
    }
    public function store (Request $request){

        if(auth()->user()) {
            \Cart::session(auth()->user()->id);
        }
        \Cart::add([
            'id' =>$request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect("product/$request->slug");
    }

    public function update(Request $request)
    {

        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success','Item Cart is updated Successfully !');


        return redirect()->route('cart.list');
    }

    public function destroy( Request $request)
    {
        if(auth()->user()) {
            \Cart::session(auth()->user()->id);
        }
        \Cart::remove($request->id);
        session()->flash('success','Item Cart Removed Successfully ! ' );

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        if(auth()->user()) {
            \Cart::session(auth()->user()->id);
        }
        \Cart::clear();
        session()->flash('success','Cart Cleared Successfully ! ');
        return redirect()->route('cart.list');
    }


}
