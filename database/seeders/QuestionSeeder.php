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
            'title' => 'Oprichting Avans',
            'description' => 'In welk jaar is Avans ontstaan?',
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Trappenhuis Avans',
            'description' => 'In het trappenhuis hangen foto’s van docenten. Hoeveel docenten hiervan zitten bij de opleiding Informatica?',
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Pizza locatie',
            'description' => 'Waar kun je pizza scoren binnen de Avans locaties in Breda?',
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Oudste docent',
            'description' => 'Wie is de oudste docent?',
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Jongste docent',
            'description' => 'Wie is de jongste docent?',
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Biochemie',
            'description' => 'Welke docent heeft Biochemie gestudeerd?',
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Opleidingen ATiX',
            'description' => 'De opleiding Informatica valt onder de academie ATiX. Hoeveel opleidingen vallen er onder deze academie?',
            'image_url' => null,
            'video_url' => null,
            'gps_location' => null,
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);
    }
}
