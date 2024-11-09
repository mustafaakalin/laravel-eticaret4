<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::with('category')->get(); // Kategorilerle birlikte ürünleri al
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
