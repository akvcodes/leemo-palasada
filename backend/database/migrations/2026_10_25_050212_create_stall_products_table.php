<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stall_products', function (Blueprint $table) {
            $table->id('stall_product_id');
            $table->foreignId('stall_id')->constrained('stalls', 'stall_id')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('product_categories', 'category_id')->onDelete('cascade');
            $table->text('product_description')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stall_products');
    }
};