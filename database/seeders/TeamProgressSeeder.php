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
            'status' => 'Nagekeken',
            'team_answer_id' => 1,
            'points' => 10,
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 1,
            'question_id' => 2,
            'status' => 'Nagekeken',
            'team_answer_id' => 2,
            'points' => 0,
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 1,
            'question_id' => 3,
            'status' => 'Nagekeken',
            'team_answer_id' => 3,
            'points' => 0,
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 1,
            'question_id' => 4,
            'status' => 'Afwachting',
            'team_answer_id' => 4,
            'points' => 0,
        ]);
    }
}
