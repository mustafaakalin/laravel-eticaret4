<?php

namespace App\Livewire;

use App\Models\Cart; // Cart modelini ekleyin
use Livewire\Component;
use Livewire\Attributes\On;

class Carts extends Component
{
    public $cartItems = [];
    public $cartCount = 0;

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        
        // Kullanıcının sepetindeki ürünler
        if (auth()->check()) {
            $this->cartItems = auth()->user()->carts()->first()->items ?? collect();
        } else {
            $this->cartItems = collect();
        }

        $this->cartCount = count($this->cartItems); // Sepetteki ürün sayısını güncelle
    }

    #[On('cart-updated')]
    public function refreshCart()
    {
        $this->updateCart(); // Sepeti güncelle
    }

    public function increaseQuantity($cartId)
    {
        $cartItem = Cart::find($cartId);
        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
            $this->dispatch('cart-updated'); // Olayı dispatch et
        }
    }

    public function decreaseQuantity($cartId)
    {
        $cartItem = Cart::find($cartId);
        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->quantity--;
            $cartItem->save();
            $this->dispatch('cart-updated'); // Olayı dispatch et
        }
    }

    public function removeItem($cartId)
    {
        Cart::destroy($cartId);
        $this->dispatch('cart-updated'); // Olayı dispatch et
    }

    public function render()
    {
        return view('livewire.carts');
    }
}
