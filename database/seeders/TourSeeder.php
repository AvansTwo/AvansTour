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
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
        ]);

        DB::table('tour')->insert([
            'name' => Str::random(10),
            'description' => 'Random description: '.Str::random(50),
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
        ]);

        DB::table('tour')->insert([
            'name' => Str::random(10),
            'description' => 'Random description: '.Str::random(50),
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
        ]);
    }
}
