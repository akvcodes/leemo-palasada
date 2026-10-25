<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_status_log', function (Blueprint $table) {
            $table->id('log_id');
            $table->foreignId('contract_id')->constrained('contracts', 'contract_id')->onDelete('cascade');
            $table->foreignId('renter_id')->constrained('renters', 'renter_id')->onDelete('cascade');
            $table->date('month_reference');
            $table->enum('payment_status', ['paid', 'unpaid', 'overdue']);
            $table->foreignId('receipt_id')->nullable()->constrained('payment_receipts', 'receipt_id')->onDelete('set null');
            $table->foreignId('recognized_by')->nullable()->constrained('users', 'id')->onDelete('set null');
            $table->timestamp('status_updated_at')->useCurrent();
            $table->text('notes')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_status_log');
    }
};