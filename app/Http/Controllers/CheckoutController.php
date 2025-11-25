<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Usado para obter o ID do usuário

class CheckoutController extends Controller
{
    /**
     * Página principal do checkout.
     * Busca itens no 'buy_now' (se houver) ou no carrinho do DB.
     */
    public function index()
    {
        $user = Auth::user();
        $items = [];
        $total = 0;

        if (!$user) {
             return redirect()->route('home')->with('error', 'Você precisa estar logado para finalizar a compra.');
        }

        // 1. Lógica "Comprar Agora" (Prioridade máxima)
        if (session()->has('buy_now')) {
            $data = session('buy_now');
            $product = Product::find($data['product_id']);
            
            if ($product) {
                // Mapeia o item temporário da sessão 'buy_now'
                $items[] = (object)[
                    'product' => $product,
                    'quantity' => $data['quantity'],
                    'price' => $data['price'] 
                ];
            }
        } 
        // 2. Lógica do Carrinho Normal (Baseado no Banco de Dados)
        else {
            // Busca os itens do carrinho no banco de dados para o usuário logado
            $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();
            
            foreach ($cartItems as $cartItem) {
                // Mapeia os itens do DB para a estrutura de checkout
                $items[] = (object)[
                    'product' => $cartItem->product,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price
                ];
            }
        }

        // 3. Calcula o total (independente da origem dos itens)
        foreach ($items as $item) {
            $total += $item->price * $item->quantity;
        }

        return view('checkout.index', compact('items', 'total'));
    }

    /**
     * Define o item para "Comprar Agora" com a quantidade enviada.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     */
    public function buyNow(Request $request, Product $product)
    {
        // Captura a quantidade enviada pelo formulário (agora obrigatório)
        $quantity = $request->input('quantity', 1); 
        
        if ($quantity < 1) {
            $quantity = 1;
        }

        // Define o item temporário na sessão 'buy_now'
        session()->put('buy_now', [
            'product_id' => $product->id,
            'quantity' => $quantity, // <--- Recebe a quantidade correta
            'price' => $product->price
        ]);

        return redirect()->route('checkout.index');
    }

    /**
     * Finaliza o pagamento.
     * Limpa o carrinho do DB (se não for "buy_now") ou o item temporário.
     */
    public function pay(Request $request)
    {
        $user = Auth::user();
        
        // 1. Se existe 'buy_now', apenas limpa essa sessão
        if (session()->has('buy_now')) {
            session()->forget('buy_now');
        } 
        // 2. Se não, limpa o carrinho completo do DB
        elseif ($user) {
            CartItem::where('user_id', $user->id)->delete();
        }

        return redirect()->route('home')->with('success', 'Compra finalizada com sucesso!');
    }
}