<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HotSpotInputController;
use App\Http\Controllers\NewCollectionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\VariablesController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[SessionsController::class,'index']);


// New Collection Section
Route::get('collection',[NewCollectionController::class,'index'])->middleware('can:admin');
Route::patch('collection/edit/{product:id}', [NewCollectionController::class,'update'])->middleware('can:admin');

//Reference Section
Route::get('reference',[NewCollectionController::class,'index'])->middleware('can:admin');
Route::patch('reference/edit/{product:id}', [NewCollectionController::class,'update'])->middleware('can:admin');

// Hotspot Section
Route::get('hotspot',[HotSpotInputController::class ,'index'])->middleware('can:admin');
Route::get('hotspot/add',[HotSpotInputController::class,'index'])->middleware('can:admin');
Route::Post('hotspot/add',[HotSpotInputController::class,'store'])->middleware('can:admin');
Route::get('hotspot/edit/{hotSpotInput:id}',[HotSpotInputController::class,'edit'])->middleware('can:admin');
Route::patch('hotspot/edit/{hotSpotInput:id}',[HotSpotInputController::class,'update'])->middleware('can:admin');
Route::delete('hotspot/{hotSpotInput:id}',[HotSpotInputController::class,'destroy'])->middleware('can:admin');
Route::post('hotspot/edit/{hotSpotInput:id}',[HotSpotInputController::class,'edit'])->middleware('can:admin');

// Logo Section
Route::get('logo',[VariablesController::class,'index'])->middleware('can:admin');
Route::delete('logo/{variables:id}',[VariablesController::class,'destroy'])->middleware('can:admin');
Route::get('logo/add',[VariablesController::class,'index'])->middleware('can:admin');
Route::post('logo/add',[VariablesController::class,'store'])->middleware('can:admin');

// About Section
Route::get('about' , [ VariablesController::class,'index' ])->middleware('can:admin');
Route::patch('about/{variables:id}',[VariablesController::class,'update'])->middleware('can:admin');


// Instagram Section
Route::get('insta',[VariablesController::class,'index'])->middleware('can:admin');
Route::patch('insta/{variables:id}',[VariablesController::class,'update'])->middleware('can:admin');
Route::get('product',[ProductController::class, 'index']);

// Admin Category Section
Route::get('category/add',[CategoryController::class, 'index'])->middleware('can:admin');
Route::post('category/add',[CategoryController::class, 'store'])->middleware('can:admin');
Route::get('category/edit/{category:id}',[CategoryController::class,'edit'])->middleware('can:admin');
Route::patch('category/{category:id}',[CategoryController::class,'update'])->middleware('can:admin');
Route::delete('category/{product:id}' ,[CategoryController::class,'destroy'])->middleware('can:admin');
Route::get('category',[CategoryController::class,'index'])->middleware('can:admin');

// Admin Product Section
Route::get('product/add',[ProductController::class, 'index'])->middleware('can:admin');
Route::post('product/add',[ProductController::class, 'store'])->middleware('can:admin');
Route::get('product/edit/{product:id}',[ProductController::class,'edit'])->middleware('can:admin');
Route::patch('product/{product:id}',[ProductController::class,'update'])->middleware('can:admin');
Route::delete('product/{product:id}' ,[ProductController::class,'destroy'])->middleware('can:admin');
Route::get('product/{product:slug}',[ProductController::class,'show']);
Route::get('product-category/{category:slug}',[CategoryController::class,'show']);

// Cart Section
Route::get('/my-cart',[CartController::class,'index'])->name('cart.list');
Route::Post('/my-cart',[CartController::class,'store'])->name('cart.store');
Route::post('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'destroy'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

//Session Section
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::get('/admin',function (){
    return view('admin.index');
} );

Route::get('{category:slug}',[CategoryController::class,'show']);

