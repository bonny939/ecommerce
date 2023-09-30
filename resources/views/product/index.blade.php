<?php
/** @var \Illuminate\Database\Eloquent\Collection $products */
?>

<x-app-layout>
    <?php if ($products->count() === 0): ?>
        <div class="text-center text-gray-600 py-16 text-xl">
            There are no products published
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-5">
            @foreach($products as $product)
                <!-- Product Item -->
                <div class="border rounded-lg overflow-hidden hover:shadow-lg transition-transform transform hover:scale-105 bg-white">
                    <a href="{{ route('product.view', $product->slug) }}">
                        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-full h-60 object-cover" />
                    </a>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">
                            <a href="{{ route('product.view', $product->slug) }}">
                                {{ $product->title }}
                            </a>
                        </h3>
                        <p class="text-gray-700 text-sm">{{ $product->description }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-lg font-bold text-purple-600">${{ $product->price }}</span>
                            <button class="btn-primary hover:bg-purple-600 hover:text-white" @click="addToCart()">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <!--/ Product Item -->
            @endforeach
        </div>
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    <?php endif; ?>
</x-app-layout>
