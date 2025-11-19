<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Mostra os itens do carrinho
    public function index()
    {
        // Certifica que o usuário está logado
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('home')->with('error', 'Você precisa estar logado.');
        }

        // Pega os itens do carrinho com os produtos
        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

        return view('cart.index', compact('cartItems'));
    }

    // Adiciona um produto ao carrinho
    public function add(Product $product)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('home')->with('error', 'Você precisa estar logado.');
        }

        // Primeiro ou cria
        $cartItem = CartItem::firstOrCreate(
            ['user_id' => $user->id, 'product_id' => $product->id],
            ['quantity' => 1]
        );

        // Se já existia, incrementa a quantidade
        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }

        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho!');
    }

    // Atualiza a quantidade de um item do carrinho
    public function update(Request $request, CartItem $cartItem)
    {
        $user = Auth::user();
        if ($cartItem->user_id !== $user->id) {
            abort(403, 'Acesso negado.');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Quantidade atualizada!');
    }

    // Remove um item do carrinho
    public function remove(CartItem $cartItem)
    {
        $user = Auth::user();
        if ($cartItem->user_id !== $user->id) {
            abort(403, 'Acesso negado.');
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removido do carrinho!');
    }
}
