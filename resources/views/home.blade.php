<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Página Inicial
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Bem-vindo -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                <h1 class="text-3xl font-bold mb-4 text-gray-800">Bem-vindo à nossa loja virtual!</h1>
                <p class="text-gray-600">Explore nossos produtos incríveis.</p>
            </div>

            <!-- Grid de produtos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white p-4 shadow rounded-lg hover:shadow-xl transition">

                        <img src="{{ asset($product->image) }}" class="w-full h-48 object-cover rounded"
                             alt="{{ $product->name }}">

                        <h2 class="text-lg font-bold mt-3">{{ $product->name }}</h2>
                        <p class="text-gray-600 text-sm mt-1">{{ $product->description }}</p>
                        <p class="text-green-600 font-semibold text-lg mt-3">
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                        </p>

                        <div class="mt-4 flex gap-2">
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-1">
                                @csrf
                                <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                                    Carrinho
                                </button>
                            </form>

                            <form action="{{ route('checkout.buyNow', $product) }}" method="POST" class="flex-1">
                                @csrf
                                <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
                                    Comprar
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>

</x-app-layout>
