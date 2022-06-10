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
            'image_url' => "Avans.jpg",
            'video_url' => null,
            'gps_location' => "51.586118505437256,4.775678388588147",
            'points' => 10,
            'tour_id' => 1,
        ]);

        DB::table('question')->insert([
            'title' => 'Pizza locatie',
            'description' => 'Waar kun je pizza scoren binnen de Avans locaties in Breda?',
            'image_url' => "https://images.pexels.com/photos/315191/pexels-photo-315191.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            'video_url' => null,
            'gps_location' => "51.589827823285766,4.773251368799545",
            'points' => 10,
            'tour_id' => 1,
        ]);

        DB::table('question')->insert([
            'title' => 'Starbucks',
            'description' => 'Waar kun je Starbucks koffie halen bij Avans?',
            'image_url' => "Starbucks.webp",
            'video_url' => null,
            'gps_location' => "51.58689353598733,4.774640876287711",
            'points' => 10,
            'tour_id' => 1,
        ]);
    }
}
