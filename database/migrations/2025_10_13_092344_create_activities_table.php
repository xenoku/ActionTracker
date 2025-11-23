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
            $table->string('name', 255)->collation('utf8mb4_unicode_ci');
            $table->text('description')->collation('utf8mb4_unicode_ci');
        });

        DB::table('activities')->insert([
            ['name' => 'Спорт', 'description' => 'Качаемся в качалке'],
            ['name' => 'Чтение', 'description' => 'Читаем азбуку'],
            ['name' => 'Готовка', 'description' => 'Готовим кушать']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};