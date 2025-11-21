<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name', 255)->collation('utf8mb4_unicode_ci');
            $table->text('description')->collation('utf8mb4_unicode_ci');
            $table->unique('user_id', 'name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};