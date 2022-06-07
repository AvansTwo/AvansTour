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
            'tour_id' => rand(1, 3)
        ]);
        DB::table('team')->insert([
            'team_name' => 'Drerrie club',
            'tour_id' => rand(1, 3)
        ]);
        DB::table('team')->insert([
            'team_name' => 'K3 fanclub',
            'tour_id' => rand(1, 3)
        ]);
    }
}
