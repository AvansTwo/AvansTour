<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TeamProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_progress')->insert([
            'team_id' => 1,
            'question_id' => 1,
            'answer_id' => 3,
            'points' => 10,
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 1,
            'question_id' => 2,
            'answer_id' => 5,
            'points' => 0,
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 1,
            'question_id' => 3,
            'answer_id' => 9,
            'points' => 0,
        ]);
    }
}
