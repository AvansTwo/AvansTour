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
            'type' => 'Meerkeuze',
            'gps_location' => "51.586118505437256,4.775678388588147",
            'points' => 10,
            'tour_id' => 1,
        ]);

        DB::table('question')->insert([
            'title' => 'Pizza locatie',
            'description' => 'Waar kun je pizza scoren binnen de Avans locaties in Breda?',
            'image_url' => "Pizza.jpg",
            'video_url' => null,
            'type' => 'Meerkeuze',
            'gps_location' => "51.589827823285766,4.773251368799545",
            'points' => 10,
            'tour_id' => 1,
        ]);

        DB::table('question')->insert([
            'title' => 'Starbucks',
            'description' => 'Waar kun je Starbucks koffie halen bij Avans?',
            'image_url' => "Starbucks.webp",
            'video_url' => null,
            'type' => 'Meerkeuze',
            'gps_location' => "51.58689353598733,4.774640876287711",
            'points' => 10,
            'tour_id' => 1,
        ]);

        DB::table('question')->insert([
            'title' => 'De grote kerk',
            'description' => 'Hoe heet de friettent aan de voet van de grote kerk van Breda?',
            'image_url' => "grotekerk.jpeg",
            'video_url' => null,
            'type' => 'Open',
            'gps_location' => "51.588832816540254,4.775367262326815",
            'points' => 20,
            'tour_id' => 1,
        ]);
    }
}
