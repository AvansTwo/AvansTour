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
            'answer' => 'lorem ipsum',
            'correct_answer' => rand(0, 2),
            'question_id' => rand(1, 3)
        ]);
        DB::table('answer')->insert([
            'answer' => 'lorem klaas',
            'correct_answer' => rand(0, 2),
            'question_id' => rand(1, 3)
        ]);  
        DB::table('answer')->insert([
            'answer' => 'klaas ipsum',
            'correct_answer' => rand(0, 2),
            'question_id' => rand(1, 3)
        ]);  
        DB::table('answer')->insert([
            'answer' => 'test ipsum',
            'correct_answer' => rand(0, 2),
            'question_id' => rand(1, 3)
        ]);  
        DB::table('answer')->insert([
            'answer' => 'lorem test',
            'correct_answer' => rand(0, 2),
            'question_id' => rand(1, 3)
        ]);  
        DB::table('answer')->insert([
            'answer' => 'oefen ipsum',
            'correct_answer' => rand(0, 2),
            'question_id' => rand(1, 3)
        ]);  
    }
}
