<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
            'image_url' => "Question-images/Avans.jpg",
            'type' => 'Meerkeuze',
            'gps_location' => "51.586118505437256,4.775678388588147",
            'points' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('question')->insert([
            'title' => 'Pizza locatie',
            'description' => 'Waar kun je pizza scoren binnen de Avans locaties in Breda?',
            'image_url' => "Question-images/Pizza.jpg",
            'type' => 'Meerkeuze',
            'gps_location' => "51.589827823285766,4.773251368799545",
            'points' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('question')->insert([
            'title' => 'Starbucks',
            'description' => 'Waar kun je Starbucks koffie halen bij Avans?',
            'image_url' => "Question-images/Starbucks.webp",
            'type' => 'Meerkeuze',
            'gps_location' => "51.58689353598733,4.774640876287711",
            'points' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('question')->insert([
            'title' => 'De grote kerk',
            'description' => 'Hoe heet de friettent aan de voet van de grote kerk van Breda?',
            'image_url' => "Question-images/Grote_kerk.jpg",
            'type' => 'Open',
            'gps_location' => "51.588832816540254,4.775367262326815",
            'points' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('question')->insert([
            'title' => 'Chasseveld',
            'description' => 'Maak een foto van de pathebioscoop op het chasseveld',
            'image_url' => "Question-images/Chasseveld.jpg",
            'type' => 'Media',
            'gps_location' => "51.58970229454752,4.7852689449590455",
            'points' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
