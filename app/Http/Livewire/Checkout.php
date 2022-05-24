<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Checkout extends Component
{
    public $cart = array();
    public $total = 0;
    public $phone = "+7";
    public $email = "";
    public $address = "";

    protected $listeners = ['cartChanged' => 'mount'];

    public function render()
    {
        $this->cart = session()->get('cart');
        return view('livewire.checkout');
    }

    public function mount(){
        $cart = session()->get('cart');
        if (!isset($cart) or is_null(($cart))){
            $this->cart = [];
        }
        else{
            $this->cart = $cart;
        }
        $this->total = $this->getTotal();
    }

    public function getTotal(){
        $total = 0;
        $cart = session()->get('cart');
        if (!isset($cart) or is_null($cart))
        {
            return number_format($total, 2);
        }
        foreach ($cart as $id => $details){
            $total += $details['price'] * $details['quantity'];
        }
        return number_format($total, 2);
    }

    public function buy(){
        $cart = session()->get('cart');
        if (!isset($cart) || is_null($cart) || count($cart) == 0)
        {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error',  'message' => 'Корзина пуста']);
            return;
        }



    }
}
