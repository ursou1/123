<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request){
        $session = $request->session()->get('cart');
        return view('cart');
    }

    public function add($id){
        $product = Product::find($id);
        $cart = session()->get('cart');

        if (!$cart){
            $cart = [
                $id => [
                    "id" => $product->id,
                    "title" => $product->title,
                    "quantity" => 1,
                    "price" => $product->cost,
                    "image" => $product->image,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->route('cart');
        }

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->route('cart');
        }

        $cart[$id] = [
            "id" => $product->id,
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->cost,
            "image" => $product->image,
            ];

        session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    public function remove($id){
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            unset($cart[$id]);
        }
    }
}
