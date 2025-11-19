<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Meu Carrinho
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
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
                                    <form method="POST" action="{{ route('cart.update', $item) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                               class="w-16 border rounded px-2 py-1">
                                        <button class="bg-green-600 text-white px-3 py-1 rounded ml-2">
                                            Atualizar
                                        </button>
                                    </form>
                                </td>

                                <td class="py-3">
                                    <form method="POST" action="{{ route('cart.remove', $item) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 text-white px-3 py-1 rounded">
                                            Remover
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</x-app-layout>
