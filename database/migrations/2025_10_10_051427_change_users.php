<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->renameColumn('password', 'password_hash');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable()->default(NULL)->after('email');
            $table->string('remember_token', 100)->collation('utf8mb4_unicode_ci')->nullable()->default(NULL);
            $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->renameColumn('password_hash', 'password');
        });
    }
};