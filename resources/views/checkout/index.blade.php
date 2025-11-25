<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Finalização da Compra
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if(count($items) > 0)
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Produto</th>
                                <th class="py-2">Preço Unitário</th>
                                <th class="py-2">Quantidade</th>
                                <th class="py-2">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr class="border-b">
                                    <td class="py-2">{{ $item->product->name }}</td>
                                    <td class="py-2">R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                                    <td class="py-2">{{ $item->quantity }}</td>
                                    <td class="py-2">R$ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr class="font-bold">
                                <td colspan="3" class="py-2 text-right">Total:</td>
                                <td class="py-2">R$ {{ number_format($total, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-6">
                        <form action="{{ route('checkout.pay') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                Finalizar Compra
                            </button>
                        </form>
                    </div>

                @else
                    <p class="text-gray-700 text-lg">Seu carrinho está vazio.</p>
                    <a href="{{ route('home') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Voltar para a loja
                    </a>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
