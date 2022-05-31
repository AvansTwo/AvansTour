<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question')->insert([
            'title' => Str::random(10),
            'description' => 'Random description: ' . Str::random(50),
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => Str::random(10),
            'description' => 'Random description: ' . Str::random(50),
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => Str::random(10),
            'description' => 'Random description: ' . Str::random(50),
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);
    }
}
