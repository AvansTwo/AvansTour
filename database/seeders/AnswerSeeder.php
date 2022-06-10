<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answer')->insert([
            'answer' => 2000,
            'correct_answer' => 0,
            'question_id' => 1
        ]);
        DB::table('answer')->insert([
            'answer' => 2002,
            'correct_answer' => 0,
            'question_id' => 1
        ]);
        DB::table('answer')->insert([
            'answer' => 2004,
            'correct_answer' => 1,
            'question_id' => 1
        ]);
        DB::table('answer')->insert([
            'answer' => 2006,
            'correct_answer' => 0,
            'question_id' => 1
        ]);
        DB::table('answer')->insert([
            'answer' => 'Lovendijkstraat',
            'correct_answer' => 0,
            'question_id' => 2
        ]);
        DB::table('answer')->insert([
            'answer' => 'Hogeschoollaan',
            'correct_answer' => 1,
            'question_id' => 2
        ]);
        DB::table('answer')->insert([
            'answer' => 'Claudius Prinsenlaan',
            'correct_answer' => 0,
            'question_id' => 2
        ]);
        DB::table('answer')->insert([
            'answer' => 'Nergens',
            'correct_answer' => 0,
            'question_id' => 2
        ]);
        DB::table('answer')->insert([
            'answer' => 'Onderwijsboulevard',
            'correct_answer' => 0,
            'question_id' => 3
        ]);
        DB::table('answer')->insert([
            'answer' => 'Beukenlaan',
            'correct_answer' => 0,
            'question_id' => 3
        ]);
        DB::table('answer')->insert([
            'answer' => 'Hogeschoollaan',
            'correct_answer' => 1,
            'question_id' => 3
        ]);
        DB::table('answer')->insert([
            'answer' => 'Lovensedijkstraat',
            'correct_answer' => 0,
            'question_id' => 3
        ]);
    }
}
