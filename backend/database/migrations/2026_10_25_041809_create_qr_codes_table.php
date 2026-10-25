<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id('qr_id');
            $table->foreignId('stall_id')->unique()->constrained('stalls', 'stall_id')->onDelete('cascade');
            $table->string('qr_code_path', 255);
            $table->string('qr_value', 255)->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamp('generated_at')->useCurrent();
            $table->timestamp('expires_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};