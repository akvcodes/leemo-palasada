<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_receipts', function (Blueprint $table) {
            $table->id('receipt_id');
            $table->foreignId('renter_id')->constrained('renters', 'renter_id')->onDelete('cascade');
            $table->foreignId('contract_id')->constrained('contracts', 'contract_id')->onDelete('cascade');
            $table->string('receipt_image_path', 255);
            $table->timestamp('upload_date')->useCurrent();
            $table->date('month_reference');
            $table->decimal('amount_paid', 10, 2);
            $table->enum('status', ['pending', 'recognized', 'filed', 'rejected'])->default('pending');
            $table->foreignId('recognized_by')->nullable()->constrained('users', 'id')->onDelete('set null');
            $table->timestamp('recognized_date')->nullable();
            $table->timestamp('filed_date')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_receipts');
    }
};