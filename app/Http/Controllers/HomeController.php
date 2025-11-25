<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        // Define welcome apenas uma vez
        if ($user && !session()->has('welcome')) {
            session(['welcome' => true]);
        }

        $products = Product::all(); // Pega todos os produtos

        return view('home', compact('products'));
    }
}
