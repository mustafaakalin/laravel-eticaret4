<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductDetail extends Component
{
    public $productId;
    public $product;

    public $comments;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->with('category')->firstOrFail();

        $this->comments = $this->product->comments;
    }

    #[On('comment-added')]
    public function refreshComments($data)
    {
        $this->comments = Product::find($data['productId'])->comments; // Refresh the comments list
    }


    public function addToCart()
    {
        $user = auth()->user(); // Kullanıcıyı al
        if ($user) {
            // Kullanıcı giriş yapmışsa, ürünü sepete ekle
            $cart = $user->cart()->first();
            if (!$cart) {
                $cart = $user->cart()->create(); // Eğer sepet yoksa oluştur
            }

            $cartItem = $cart->items()->where('product_id', $this->product->id)->first();
            if ($cartItem) {
                // Ürün zaten sepette varsa, adetini artır
                $cartItem->increment('quantity');
            } else {
                // Ürün yoksa sepete ekle
                $cart->items()->create([
                    'product_id' => $this->product->id,
                    'quantity' => 1,
                ]);
            }

            // Toast bildirimini tetikleme
            $this->dispatch('toast', ['message' => 'Sepete eklendi!']);
        } else {
            // Kullanıcı giriş yapmamışsa uygun bir hata mesajı göster
            $this->dispatch('toast', ['message' => 'Önce giriş yapmalısınız.']);
        }
    }



    public function render()
    {
        return view('livewire.product-detail');
    }
}
