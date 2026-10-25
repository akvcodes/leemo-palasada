<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stalls', function (Blueprint $table) {
            $table->id('stall_id');
            $table->string('stall_number', 20)->unique();
            $table->decimal('location_x', 10, 6);
            $table->decimal('location_y', 10, 6);
            $table->string('category', 50);
            $table->decimal('size_sqm', 5, 2);
            $table->decimal('monthly_rental_fee', 10, 2);
            $table->enum('status', ['vacant', 'occupied', 'maintenance'])->default('vacant');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stalls');
    }
};