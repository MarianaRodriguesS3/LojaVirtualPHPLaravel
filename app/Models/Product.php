<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url', // ou 'image_path', dependendo de como vai salvar a imagem
    ];

    /**
     * Relacionamento inverso com CartItem
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
