<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants')->insert([
            'name' => 'Jan dijkhof',
            'team_id' => rand(1, 3)
        ]);
        DB::table('participants')->insert([
            'name' => 'Klaas dijkhof',
            'team_id' => rand(1, 3)
        ]);
        DB::table('participants')->insert([
            'name' => 'Mark Rutte',
            'team_id' => rand(1, 3)
        ]);
        DB::table('participants')->insert([
            'name' => 'Huge de Oude',
            'team_id' => rand(1, 3)
        ]);
    }
}
