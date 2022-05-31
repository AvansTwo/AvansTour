<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->insert([
            'team_name' => 'Batieboys',
            'start_time' => '2018-4-20',
            'start_time' => '2018-4-50',
            'total_points' => rand(0, 100),
            'tour_id' => rand(1, 3)
        ]);
        DB::table('team')->insert([
            'team_name' => 'Drerrie club',
            'start_time' => '2018-4-20',
            'start_time' => '2018-4-50',
            'total_points' => rand(0, 100),
            'tour_id' => rand(1, 3)
        ]);
        DB::table('team')->insert([
            'team_name' => 'K3 fanclub',
            'start_time' => '2018-4-20',
            'start_time' => '2018-4-50',
            'total_points' => rand(0, 100),
            'tour_id' => rand(1, 3)
        ]);
    }
}
