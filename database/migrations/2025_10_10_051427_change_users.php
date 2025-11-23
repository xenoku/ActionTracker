<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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

        DB::table('users')->insert([
            ['name' => 'aboba', 'email' => 'abobaxxx@gmail.com', 'password_hash' => 'f3197ee1c4af34182e7ca3d988fd6f18'],
            ['name' => 'gooba333', 'email' => 'fwvewwew@gmail.com', 'password_hash' => '1e2a150d41263ce2cc6782f75fd2b4dc'],
            ['name' => 'seledka', 'email' => 'seld@gmail.com', 'password_hash' => '461c4683cbd2b57a34a8a14a7b91b972']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
};