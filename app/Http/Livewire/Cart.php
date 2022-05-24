<?php

namespace App\Http\Livewire;

use Livewire\Component;
use MongoDB\Driver\Session;

class Cart extends Component
{
    public $cart = array();
    public $total = 0;
    public $totalCount = 0;

    protected $listeners = ['cartChanged' => 'mount'];

    public function mount(){
        $cart = session()->get('cart');
        if (!isset($cart) or is_null(($cart))){
            $this->cart = [];
    }
        else{
            $this->cart = $cart;
    }
    $this->total = $this->getTotal();
    $this->totalCount = $this->getTotalCount();
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        $this->emit('cartChanged');
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Товар успешно убран из корзины!']);
        //$this->render();
    }
    public function render()
    {
       $this->cart = session()->get('cart');
        $this->total = $this->getTotal();
        $this->totalCount = $this->getTotalCount();
        return view('livewire.cart');
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

    public function getTotalCount(){
        $count = 0;
        $cart = session()->get('cart');
        if (!isset($cart) or is_null($cart))
        {
            return $count;
        }
        foreach ($cart as $id => $details){
            $count += $details['quantity'];
        }
        return $count;
    }
    public function alertError()
    {
        $this->dispatchBrowserEvent('alert',
            ['type' => 'error',  'message' => 'Something is Wrong!']);
    }
}
