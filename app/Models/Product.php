<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'image', // corresponde à coluna no banco
    ];

    /**
     * Relacionamento inverso com CartItem
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Accessor para 'image'.
     * Retorna o valor da imagem do banco de dados ($value) ou uma placeholder se for NULL/vazio.
     *
     * @param string|null $value O valor original da coluna 'image' no banco de dados.
     * @return string
     */
    public function getImageAttribute(?string $value): string
    {
        // VERIFICAÇÃO CORRETA: Usa $value (o dado do banco) para evitar recursão.
        return $value ? $value : 'https://via.placeholder.com/300x200?text=Sem+imagem';
    }
}