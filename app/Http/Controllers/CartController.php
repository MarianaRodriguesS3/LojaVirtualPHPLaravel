<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('home')->with('error', 'Você precisa estar logado.');
        }

        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Product $product)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('home')->with('error', 'Você precisa estar logado.');
        }

        $cartItem = CartItem::firstOrCreate(
            ['user_id' => $user->id, 'product_id' => $product->id],
            ['quantity' => 1]
        );

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }

        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho!');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $user = Auth::user();
        if ($cartItem->user_id !== $user->id) {
            abort(403, 'Acesso negado.');
        }

        $request->validate(['quantity' => 'required|integer|min:1']);

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Carrinho atualizado com sucesso');
    }

    public function remove(CartItem $cartItem)
    {
        $user = Auth::user();
        if ($cartItem->user_id !== $user->id) {
            abort(403, 'Acesso negado.');
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Produto removido com sucesso');
    }
}
