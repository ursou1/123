<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CartView extends Component
{
    public $cart = array();
    public $total = 0;

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
    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        $this->render();
        $this->emit('cartChanged');
    }
    public function increment($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }
        $this->emit('cartChanged');
    }
    public function decrement($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');

        if(isset($cart[$id]) && $cart[$id]['quantity'] > 1){
            $cart[$id]['quantity']--;
            session()->put('cart', $cart);
        }
        $this->emit('cartChanged');
    }
    public function render()
    {
        $this->cart = session()->get('cart');
        $this->total = $this->getTotal();
        return view('livewire.cart-view');
    }
    public function clearCart()
    {
        $cart = session()->get('cart');
        foreach ($cart as $id){
                unset($cart[$id['id']]);
                session()->put('cart', $cart);
            }
        $this->render();
        $this->emit('cartChanged');
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Корзина очищена']);

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
}
