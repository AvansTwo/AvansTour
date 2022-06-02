<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tour')->insert([
            'name' => Str::random(10),
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'https://www.showbizz24.be/sites/showbizz24/files/styles/news/public/2022-05/K3%20TVK_S6_Knock-Outs2_Afl07_K_001%20%281%29.jpg?h=a2ce9a45&itok=TaVdQcoL',
            'location' => '0',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
        ]);

        DB::table('tour')->insert([
            'name' => Str::random(10),
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'https://images.ctfassets.net/3p0bn61n86ty/2q7dm7AMRxtZAttpK929Sh/62a105b251ef163fe6485d14ea80a94b/538-Koningsdag-c-Radio-538.png?fit=thumb&w=1200&h=675&fm=jpg',
            'location' => '0',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
        ]);

        DB::table('tour')->insert([
            'name' => Str::random(10),
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'https://sportnieuws.nl/app/uploads/2017/05/Dessers.jpg',
            'location' => '0',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
        ]);
    }
}
