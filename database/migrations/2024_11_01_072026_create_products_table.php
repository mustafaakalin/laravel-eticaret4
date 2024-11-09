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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ürün ismi
            $table->text('description'); // Ürün açıklaması
            $table->decimal('price', 10, 2); // Ürün fiyatı
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Kategori ID'si
            $table->integer('stock'); // Stok miktarı
            $table->string('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
