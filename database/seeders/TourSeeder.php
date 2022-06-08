<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
            'name' => 'Tour Breda #',
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'KMA.jpeg',
            'location' => '51.596533435938,4.770765207282786',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Tour Breda #',
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'KMA.jpeg',
            'location' => '51.596533435938,4.770765207282786',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Tour Breda #',
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'KMA.jpeg',
            'location' => '51.596533435938,4.770765207282786',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Tour Breda #',
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'KMA.jpeg',
            'location' => '51.596533435938,4.770765207282786',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Tour Breda #',
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'KMA.jpeg',
            'location' => '51.596533435938,4.770765207282786',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Tour Breda #',
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'KMA.jpeg',
            'location' => '51.596533435938,4.770765207282786',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Tour Breda #',
            'description' => 'Random description: '.Str::random(50),
            'image_url' => 'KMA.jpeg',
            'location' => '51.596533435938,4.770765207282786',
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
