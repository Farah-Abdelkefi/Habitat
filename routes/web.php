<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HotSpotInputController;
use App\Http\Controllers\NewCollectionController;
use App\Http\Controllers\ReferenceController;
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


Route::middleware('can:admin')->group(function () {

    // New Collection Section
    Route::controller(NewCollectionController::class)->group(function () {
        Route::get('collection', 'index');
        Route::patch('collection', 'update');

    });

    // HotSpot Section
    Route::controller(HotSpotInputController::class)->group(function () {
        Route::get('hotspot','index');
        Route::get('hotspot/add', 'index');
        Route::Post('hotspot/add','store');
        Route::get('hotspot/edit/{hotSpotInput:id}','edit');
        Route::patch('hotspot/edit/{hotSpotInput:id}','update');
        Route::delete('hotspot/{hotSpotInput:id}','destroy');
        Route::post('hotspot/edit/{hotSpotInput:id}','edit');
    });

    // About & Logo & Insta Section
    Route::controller(VariablesController::class)->group(function () {

        // Logo Section
        Route::get('logo','index');
        Route::delete('logo/{variables:id}','destroy');
        Route::get('logo/add','index');
        Route::post('logo/add','store');

        // About Section
        Route::get('about' , 'index' );
        Route::patch('about','update');

        // Instagram Section
        Route::get('insta','index');
        Route::patch('insta','update');
    });

    // Admin Category Section
    Route::controller(CategoryController::class)->group(function (){
        Route::get('category/add', 'index');
        Route::post('category/add', 'store');
        Route::get('category/edit/{category:id}','edit');
        Route::patch('category/{category:id}','update');
        Route::delete('category/{product:id}' ,'destroy');
        Route::get('category','index');

    });

    // Admin Product Section
    Route::controller(ProductController::class)->group(function () {
        Route::get('product/add',  'add');
        Route::post('product/add', 'store');
        Route::get('product/edit/{product:id}','edit');
        Route::patch('product/{product:id}',  'update');
        Route::delete('product/{product:id}',  'destroy');

    });

    //Reference Section
    Route::controller(ReferenceController::class)->group(function () {

        Route::get('reference',[ReferenceController::class,'index']);
        Route::get('reference/add','add');
        Route::post('reference/add', 'store');
        Route::get('reference/edit/{reference:id}','edit');
        Route::patch('reference/{reference:id}','update');
        Route::delete('reference/{reference:id}','destroy');
    });


});





Route::get('product',[ProductController::class, 'index']);


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

