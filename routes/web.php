<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Cart;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('shop-list-right-sidebar');
});
Route::get('/cart3', function () {
    return view('cart');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/',[\App\Http\Controllers\ProductController::class,'index']);
Route::get('/single-product/{slug}',[\App\Http\Controllers\ProductController::class,'singleProduct'])->name('single-product');
Route::get('/cart',[\App\Http\Controllers\CartController::class,'index'])->name('cart');

Route::get('/add-to-cart/{id}',[\App\Http\Controllers\CartController::class,'add'])->name('add-to-cart');
Route::get('notification', Cart::class);
Route::view('/livewire', 'livewire');
