<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\User;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function index()
    {
        return view ('devis.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'email|max:255|unique:users,email',
            'phone-number' => 'required|numeric',
            'city' => 'required',
            'postal-code' =>'required|numeric',
            'category_id' =>'required',
            'besoin' =>'required'
        ]);
        $user = User::where('name',$request->name)->first();

        Devis::create([
            'category_id' => $request->category_id ,
            'user_id' => $user->id,
        ]);
    }

    public function show(Devis $devis)
    {
        return $devis;
    }

    public function update(Request $request, Devis $devis)
    {
        $request->validate([

        ]);

        $devis->update($request->validated());

        return $devis;
    }

    public function destroy(Devis $devis)
    {
        $devis->delete();

        return response()->json();
    }
}
