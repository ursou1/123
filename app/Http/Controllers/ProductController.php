<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('shop-list-right-sidebar', ['products' =>$products]);
    }

    public function singleProduct(Request $request, $slug){
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('single-product',['product'=>$product]);
    }
}
