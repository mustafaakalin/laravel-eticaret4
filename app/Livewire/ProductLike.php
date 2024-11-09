<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductLike extends Component
{
    public $product;
    public $liked = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        // Kullanıcının daha önce beğenip beğenmediğini kontrol et (örneğin, session'dan)
        $this->liked = session()->has("liked.{$this->product->id}");
    }

    public function toggleLike()
    {
        $this->liked = !$this->liked;
        session()->put("liked.{$this->product->id}", $this->liked);
    }

    public function render()
    {
        return view('livewire.product-like');
    }
}
