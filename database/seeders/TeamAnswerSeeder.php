<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_answer')->insert([
            'answer' => '2004',
        ]);

        DB::table('team_answer')->insert([
            'answer' => 'Lovendijkstraat',
        ]);

        DB::table('team_answer')->insert([
            'answer' => 'Onderwijsboulevard',
        ]);

        DB::table('team_answer')->insert([
            'answer' => 'De friettent aan de voet van de grote kerk heet  "De toren',
        ]);

        DB::table('team_answer')->insert([
            'answer' => '20220614080121pathe.png',
            'is_file' => 1
        ]);
    }
}
