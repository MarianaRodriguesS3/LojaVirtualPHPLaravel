<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                @foreach($products as $product)
                    <div class="bg-white p-4 shadow rounded">
                        <img src="{{ $product->image }}" class="w-full h-40 object-cover rounded" alt="{{ $product->name }}">
                        
                        <h2 class="text-lg font-bold mt-3">{{ $product->name }}</h2>
                        <p class="text-gray-600">{{ $product->description }}</p>
                        <p class="text-green-600 font-semibold mt-2">R$ {{ number_format($product->price, 2, ',', '.') }}</p>

                        <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-3">
                            @csrf
                            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">
                                Adicionar ao Carrinho
                            </button>
                        </form>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
