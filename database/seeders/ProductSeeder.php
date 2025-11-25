<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Tênis Feminino Branco',
                'description' => 'Tênis feminino confortável branco.',
                'price' => 82.90,
                'image' => 'images/tenis1.jpeg'
            ],
            [
                'name' => 'Tênis All Star',
                'description' => 'Tênis All Star Azul',
                'price' => 129.90,
                'image' => 'images/tenis2.jpeg'
            ],
            [
                'name' => 'Tênis Nike',
                'description' => 'Tênis Nike Air Force',
                'price' => 109.90,
                'image' => 'images/tenis3.jpeg'
            ],
            [
                'name' => 'Tênis Vans',
                'description' => 'Sapatenis Deals Tênis Vans Unisex',
                'price' => 89.90,
                'image' => 'images/tenis4.jpeg'
            ],
            [
                'name' => 'Tênis Feminino Rose',
                'description' => 'Tênis Feminino Branco Rose Sara',
                'price' => 109.90,
                'image' => 'images/tenis5.jpeg'
            ],
            [
                'name' => 'Tênis Adidas',
                'description' => 'Tênis Adidas Feminino Grand Court 2.0',
                'price' => 259.90,
                'image' => 'images/tenis6.jpeg'
            ],
            [
                'name' => 'Tênis Branco Casual',
                'description' => 'Tênis Feminino Branco Casual',
                'price' => 79.90,
                'image' => 'images/tenis7.jpeg'
            ],
            [
                'name' => 'Tênis Shoes',
                'description' => 'Tênis Feminino Casual Original Shoes',
                'price' => 99.90,
                'image' => 'images/tenis8.jpeg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
