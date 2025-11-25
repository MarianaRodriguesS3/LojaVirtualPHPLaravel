<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Meu Carrinho</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 overflow-x-auto">
                @if($cartItems->isEmpty())
                    <p class="text-gray-600">Seu carrinho está vazio.</p>
                @else
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Produto</th>
                                <th class="py-2">Preço</th>
                                <th class="py-2">Quantidade</th>
                                <th class="py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr class="border-b">
                                    <td class="py-3">{{ $item->product->name }}</td>
                                    <td class="py-3">R$ {{ number_format($item->product->price, 2, ',', '.') }}</td>
                                    <td class="py-3">
                                        <form method="POST" action="{{ route('cart.update', $item) }}" class="flex items-center gap-2">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                                class="w-16 border rounded px-2 py-1">
                                            <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">Editar</button>
                                        </form>
                                    </td>
                                    <td class="py-3 flex gap-2">
                                        <form method="POST" action="{{ route('cart.remove', $item) }}">
                                            @csrf
                                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Remover</button>
                                        </form>

                                        {{-- INÍCIO DA CORREÇÃO: Adicionando o campo 'quantity' ao formulário Comprar --}}
                                        <form method="POST" action="{{ route('checkout.buyNow', $item->product) }}">
                                            @csrf
                                            <input type="hidden" name="quantity" value="{{ $item->quantity }}">
                                            <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Comprar</button>
                                        </form>
                                        {{-- FIM DA CORREÇÃO --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6 text-right">
                        {{-- O botão Finalizar Compra não precisa de um form POST vazio, um link ou form GET simples é suficiente para ir ao checkout --}}
                        <form action="{{ route('checkout.index') }}">
                            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                                Finalizar Compra
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>