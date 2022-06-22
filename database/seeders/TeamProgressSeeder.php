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

        //team 1 progress
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
            'question_id' => 2,
            'status' => 'Nagekeken',
            'team_answer_id' => 2,
            'points' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 1,
            'question_id' => 3,
            'status' => 'Nagekeken',
            'team_answer_id' => 3,
            'points' => 0,
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

                //team 2 progress
                DB::table('team_progress')->insert([
                    'team_id' => 2,
                    'question_id' => 6,
                    'status' => 'Nagekeken',
                    'team_answer_id' => 6,
                    'points' => 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                DB::table('team_progress')->insert([
                    'team_id' => 2,
                    'question_id' => 7,
                    'status' => 'Nagekeken',
                    'team_answer_id' => 7,
                    'points' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                DB::table('team_progress')->insert([
                    'team_id' => 2,
                    'question_id' => 8,
                    'status' => 'Nagekeken',
                    'team_answer_id' => 8,
                    'points' => 0,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                DB::table('team_progress')->insert([
                    'team_id' => 2,
                    'question_id' => 9,
                    'status' => 'Afwachting',
                    'team_answer_id' => 9,
                    'points' => 20,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                DB::table('team_progress')->insert([
                    'team_id' => 2,
                    'question_id' => 10,
                    'status' => 'Afwachting',
                    'team_answer_id' => 10,
                    'points' => 20,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                        //team 3 progress
        DB::table('team_progress')->insert([
            'team_id' => 3,
            'question_id' => 11,
            'status' => 'Nagekeken',
            'team_answer_id' => 11,
            'points' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 3,
            'question_id' => 12,
            'status' => 'Nagekeken',
            'team_answer_id' => 12,
            'points' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 3,
            'question_id' => 13,
            'status' => 'Nagekeken',
            'team_answer_id' => 13,
            'points' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 3,
            'question_id' => 14,
            'status' => 'Afwachting',
            'team_answer_id' => 14,
            'points' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 3,
            'question_id' => 15,
            'status' => 'Afwachting',
            'team_answer_id' => 15,
            'points' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
                //team 4 progress
                DB::table('team_progress')->insert([
                    'team_id' => 4,
                    'question_id' => 16,
                    'status' => 'Nagekeken',
                    'team_answer_id' => 16,
                    'points' => 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                DB::table('team_progress')->insert([
                    'team_id' => 4,
                    'question_id' => 17,
                    'status' => 'Nagekeken',
                    'team_answer_id' => 17,
                    'points' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                DB::table('team_progress')->insert([
                    'team_id' => 4,
                    'question_id' => 18,
                    'status' => 'Nagekeken',
                    'team_answer_id' => 18,
                    'points' => 0,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                DB::table('team_progress')->insert([
                    'team_id' => 4,
                    'question_id' => 19,
                    'status' => 'Afwachting',
                    'team_answer_id' => 19,
                    'points' => 20,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                DB::table('team_progress')->insert([
                    'team_id' => 4,
                    'question_id' => 20,
                    'status' => 'Afwachting',
                    'team_answer_id' => 20,
                    'points' => 20,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                        //team 5 progress
        DB::table('team_progress')->insert([
            'team_id' => 5,
            'question_id' => 21,
            'status' => 'Nagekeken',
            'team_answer_id' => 21,
            'points' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 5,
            'question_id' => 22,
            'status' => 'Nagekeken',
            'team_answer_id' => 22,
            'points' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 5,
            'question_id' => 23,
            'status' => 'Nagekeken',
            'team_answer_id' => 23,
            'points' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 5,
            'question_id' => 24,
            'status' => 'Afwachting',
            'team_answer_id' => 24,
            'points' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('team_progress')->insert([
            'team_id' => 5,
            'question_id' => 25,
            'status' => 'Afwachting',
            'team_answer_id' => 25,
            'points' => 20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
