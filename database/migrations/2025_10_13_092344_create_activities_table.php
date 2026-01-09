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
            $table->string('name', 255);
            $table->foreignId('user_id')->nullable()->constrained()->default(NULL);
            $table->text('description');
            $table->text('image_url')->nullable();
            $table->timestamps();
        });

        DB::table('activities')->insert([
            ['name' => 'Working', 'user_id' => NULL, 'description' => 'Making big rocks into little rocks', 'image_url' => 'https://storage.yandexcloud.net/actiontracker-main/activityImages/6960ea931a882_workingIc.jpg'],
            ['name' => 'Free time', 'user_id' => '2', 'description' => 'Making big rocks into little rocks, but for fun', 'image_url' => 'https://storage.yandexcloud.net/actiontracker-main/activityImages/6960f37b92f6e_freeTimeIc.png'],
            ['name' => 'Sleeping', 'user_id' => NULL, 'description' => 'Not having dreams and nightmares', 'image_url' => 'https://storage.yandexcloud.net/actiontracker-main/activityImages/6960f2d3e2056_sleepingIc.png'],
            ['name' => 'Eating', 'user_id' => NULL, 'description' => 'Mostly nutrients', 'image_url' => 'https://storage.yandexcloud.net/actiontracker-main/activityImages/6960f30c0ae71_eatingIc.jpg']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
