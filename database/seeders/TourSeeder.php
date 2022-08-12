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
            'name' => 'Informatica',
            'description' => 'Tour voor 1e jaars Informatica studenten',
            'image_url' => 'Tour-images/Informatica.jpg',
            'location' => '51.58590196238844,4.792352179256427',
            'category_id' => 1,
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Mechatronica',
            'description' => 'Tour voor 1e jaars Mechatronica studenten',
            'image_url' => 'Tour-images/Mechatronica.jpg',
            'location' => '51.58590196238844,4.792352179256427',
            'category_id' => 2,
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Werktuigbouwkunde',
            'description' => 'Tour voor 1e jaars Werktuigbouwkunde studenten',
            'image_url' => 'Tour-images/Werktuigbouwkunde.jpg',
            'location' => '51.58590196238844,4.792352179256427',
            'category_id' => 3,
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Technische Informatica',
            'description' => 'Tour voor 1e jaars Technische Informatica studenten',
            'image_url' => 'Tour-images/TechnischeInformatica.jpg',
            'location' => '51.58590196238844,4.792352179256427',
            'category_id' => 4,
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Industrial Engineering & Management',
            'description' => 'Tour voor 1e jaars Industrial Engineering & Management studenten',
            'image_url' => 'Tour-images/Industrial_Engineering_Management.jpg',
            'location' => '51.58590196238844,4.792352179256427',
            'category_id' => 5,
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Business IT & Management',
            'description' => 'Tour voor 1e jaars Business IT & Management studenten',
            'image_url' => 'Tour-images/Business_IT_Management.jpg',
            'location' => '51.58590196238844,4.792352179256427',
            'category_id' => 6,
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tour')->insert([
            'name' => 'Elektrotechniek',
            'description' => 'Tour voor 1e jaars Elektrotechniek studenten',
            'image_url' => 'Tour-images/Elektrotechniek.jpg',
            'location' => '51.58590196238844,4.792352179256427',
            'category_id' => 7,
            'user_id' => rand(1, 5),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
