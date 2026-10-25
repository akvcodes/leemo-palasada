<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('market_maps', function (Blueprint $table) {
            $table->id('map_id');
            $table->string('map_name', 100);
            $table->string('map_image_path', 255);
            $table->integer('width');
            $table->integer('height');
            $table->integer('default_zoom');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('market_maps');
    }
};