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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('last_name');
            $table->string('verification_token')->nullable()->after('email_verified_at');
            $table->string('otp_code')->nullable()->after('password');
            $table->timestamp('otp_expires_at')->nullable()->after('otp_code');
            $table->enum('role', ['admin', 'user'])->default('user')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'avatar',
                'verification_token',
                'otp_code',
                'otp_expires_at',
                'role'
            ]);
        });
    }
};
