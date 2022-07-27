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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 1,
            'question_id' => 4,
            'status' => 'Afwachting',
            'team_answer_id' => 4,
            'points' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 1,
            'question_id' => 5,
            'status' => 'Afwachting',
            'team_answer_id' => 5,
            'points' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
