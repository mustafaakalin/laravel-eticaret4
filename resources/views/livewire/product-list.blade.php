<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
    @foreach($products as $product)
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{ asset('images/default-product.jpg') }}" alt="{{ $product->name }}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                <p class="text-gray-700 text-base">{{ $product->description }}</p>
                <p class="text-gray-900 font-bold text-xl">${{ $product->price }}</p>
                <div class="mt-4">
                    <a href="{{ route('product.detail', $product->slug) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        View Details
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
