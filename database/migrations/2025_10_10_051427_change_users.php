<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->boolean('is_admin')->default(false);
        });

        DB::table('users')->insert([
            ['name' => 'aboba', 'email' => 'abobaxxx@gmail.com', 'password' => Hash::make('первый'), 'is_admin' => false],
            ['name' => 'gooba333', 'email' => 'fwvewwew@gmail.com', 'password' => Hash::make('второй'), 'is_admin' => false],
            ['name' => 'seledka', 'email' => 'seld@gmail.com', 'password' => Hash::make('третий'), 'is_admin' => true]
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