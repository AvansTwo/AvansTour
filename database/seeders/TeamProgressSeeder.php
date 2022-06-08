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
            'answer_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'points' => rand(0, 100),
        ]);
    }
}
