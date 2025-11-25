<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui ficam todas as rotas web da aplicação.
|
*/

// -----------------------------
// Página inicial
// -----------------------------
Route::get('/', [HomeController::class, 'home'])->name('home');

// -----------------------------
// Visualização individual de produto
// -----------------------------
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// -----------------------------
// Rotas de carrinho e checkout (somente usuários logados)
// -----------------------------
Route::middleware('auth')->group(function () {

    // Carrinho
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/buy-now/{product}', [CheckoutController::class, 'buyNow'])->name('checkout.buyNow');

    // Finalizar pagamento
    Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');
});

// -----------------------------
// Dashboard e perfil (Breeze)
// -----------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -----------------------------
// Rotas de autenticação (Breeze)
// -----------------------------
require __DIR__.'/auth.php';
