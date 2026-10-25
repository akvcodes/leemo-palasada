<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email_verified_at');

            $table->string('first_name', 50)->after('id');
            $table->string('last_name', 50)->after('first_name');
            $table->enum('role', ['super_admin', 'renter'])->default('renter')->after('password');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active')->after('role');
            $table->timestamp('last_login')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name', 'role', 'status', 'last_login']);
            $table->string('name')->after('id');
            $table->timestamp('email_verified_at')->nullable()->after('email');
        });
    }
};