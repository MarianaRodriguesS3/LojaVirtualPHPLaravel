<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // ID do item do carrinho
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Referência ao usuário
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Referência ao produto
            $table->integer('quantity')->default(1); // Quantidade do produto no carrinho
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
