<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('my_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('activity_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
        });

        DB::table('my_sessions')->insert([
            ['user_id' => 1, 'activity_id' => 1, 'start_time' => '2025-11-22 14:00:00', 'end_time' => '2025-11-22 15:00:00'],
            ['user_id' => 1, 'activity_id' => 2, 'start_time' => '2025-11-22 15:00:00', 'end_time' => '2025-11-22 16:00:00'],
            ['user_id' => 1, 'activity_id' => 1, 'start_time' => '2025-11-22 16:00:00', 'end_time' => '2025-11-22 17:00:00']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('my_sessions');
    }
};
