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
        Schema::create('users_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('activity_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('users_activities')->insert([
            ['user_id' => 1, 'activity_id' => 1],
            ['user_id' => 1, 'activity_id' => 2],
            ['user_id' => 1, 'activity_id' => 3],
            ['user_id' => 2, 'activity_id' => 1],
            ['user_id' => 2, 'activity_id' => 3],
            ['user_id' => 3, 'activity_id' => 3]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_activities');
    }
};
