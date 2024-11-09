<div class="drawer">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <input id="my-cart-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <label for="my-cart-drawer" >Sepeti Görüntüle</label>
    </div>

    <div class="drawer-side">
        <label for="my-cart-drawer" class="drawer-overlay"></label> 
        <ul class="menu p-4 w-80 bg-base-200 text-base-content">
            <h2 class="text-lg font-bold">Sepetiniz</h2>
            @forelse($cartItems as $item)
                <li class="flex justify-between items-center">
                    <span>{{ $item->product->name }} ({{ $item->quantity }})</span>
                    <div>
                        <button wire:click="increaseQuantity({{ $item->id }})" class="btn btn-sm">+</button>
                        <button wire:click="decreaseQuantity({{ $item->id }})" class="btn btn-sm">-</button>
                        <button wire:click="removeItem({{ $item->id }})" class="btn btn-sm btn-error">X</button>
                    </div>
                </li>
            @empty
                <li>Sepetinizde ürün yok.</li>
            @endforelse
            <div class="divider"></div>
            <li>
                <span class="font-bold">Toplam:</span> {{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }} TL
            </li>
            <li>
                <a href="{{ url('checkout') }}" class="btn btn-primary">Ödeme Sayfasına Git</a>
            </li>
        </ul>
    </div>
</div>
