<!-- resources/views/products/detail.blade.php -->
<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-white shadow-md rounded-lg p-5">
        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-64 object-cover mt-4 rounded">
        <p class="mt-2 text-gray-700">{{ $product->description }}</p>
        <p class="mt-4 text-xl font-semibold">Fiyat: {{ number_format($product->price, 2) }} ₺</p>
        <p class="mt-2">Stok: {{ $product->stock }} adet</p>

        <div class="mt-4">
            <button wire:click="addToCart" class="btn btn-primary">Sepete Ekle</button>
            @livewire('product-like', ['product' => $product])
        </div>
    </div>


    <div class="mt-4">
        <livewire:add-comment :productId="$product->id" />
    </div>

    <div class="mt-10">
        <h2 class="text-xl font-bold">Yorumlar</h2>
        <div>
            @foreach($product->comments as $comment)
                <div class="mt-2 border-b">
                    <p class="font-semibold">{{ $comment->user->name ?? 'Anonim' }}</p>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
        
    </div>


</div>

