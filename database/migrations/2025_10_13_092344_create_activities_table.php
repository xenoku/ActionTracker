<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name', 255)->collation('utf8mb4_unicode_ci');
            $table->text('description')->collation('utf8mb4_unicode_ci');
        });

        DB::table('activities')->insert([
            ['user_id' => 1, 'name' => 'Спорт', 'description' => 'Качаемся в качалке'],
            ['user_id' => 1, 'name' => 'Чтение', 'description' => 'Читаем азбуку'],
            ['user_id' => 1, 'name' => 'Готовка', 'description' => 'Готовим кушать']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};