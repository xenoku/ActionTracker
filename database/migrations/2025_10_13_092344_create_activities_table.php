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
            $table->foreignId('user_id')->nullable()->constrained();
            $table->text('description')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });

        DB::table('activities')->insert([
            ['name' => 'Pause', 'user_id' => NULL, 'description' => 'Don\'t keep records'],
            ['name' => 'Спорт', 'user_id' => '2', 'description' => 'Качаемся в качалке'],
            ['name' => 'Чтение', 'user_id' => NULL, 'description' => 'Читаем азбуку'],
            ['name' => 'Готовка', 'user_id' => NULL, 'description' => 'Готовим кушать']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};