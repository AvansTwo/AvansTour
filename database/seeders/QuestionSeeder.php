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
            'image_url' => "https://images.pexels.com/photos/773471/pexels-photo-773471.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            'video_url' => null,
            'gps_location' => "51.586118505437256,4.775678388588147",
            'points' => rand(0, 100),
            'tour_id' => 1,
        ]);

        DB::table('question')->insert([
            'title' => 'Trappenhuis Avans',
            'description' => 'In het trappenhuis hangen foto’s van docenten. Hoeveel docenten hiervan zitten bij de opleiding Informatica?',
            'image_url' => "https://images.pexels.com/photos/169677/pexels-photo-169677.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" ,
            'video_url' => null,
            'gps_location' => "51.59128399425346,4.779472317631678",
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Pizza locatie',
            'description' => 'Waar kun je pizza scoren binnen de Avans locaties in Breda?',
            'image_url' => "https://images.pexels.com/photos/315191/pexels-photo-315191.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            'video_url' => null,
            'gps_location' => "51.589827823285766,4.773251368799545",
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Oudste docent',
            'description' => 'Wie is de oudste docent?',
            'image_url' => "https://images.pexels.com/photos/548084/pexels-photo-548084.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            'video_url' => null,
            'gps_location' => "51.58362453579701,4.778281955253976",
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Jongste docent',
            'description' => 'Wie is de jongste docent?',
            'image_url' => "https://images.pexels.com/photos/1426494/pexels-photo-1426494.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            'video_url' => null,
            'gps_location' => "51.588204046810105,4.775242251517529",
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Biochemie',
            'description' => 'Welke docent heeft Biochemie gestudeerd?',
            'image_url' => "https://images.pexels.com/photos/462331/pexels-photo-462331.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            'video_url' => null,
            'gps_location' => "51.58689353598733,4.774640876287711",
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);

        DB::table('question')->insert([
            'title' => 'Opleidingen ATiX',
            'description' => 'De opleiding Informatica valt onder de academie ATiX. Hoeveel opleidingen vallen er onder deze academie?',
            'image_url' => "https://images.pexels.com/photos/380283/pexels-photo-380283.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            'video_url' => null,
            'gps_location' => "51.589231595939644,4.773747309367736",
            'points' => rand(0, 100),
            'tour_id' => rand(1, 3),
        ]);
    }
}
