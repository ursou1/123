<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index(Request $request){
        $session = $request->session()->get('cart');
        return view('checkout');
    }
}
