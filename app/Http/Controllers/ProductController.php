<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    // Lista todos os produtos
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Mostra um produto específico
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
