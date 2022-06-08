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
            'answer' => 3,
            'correct_answer' => 0,
            'question_id' => 2
        ]);  
        DB::table('answer')->insert([
            'answer' => 6,
            'correct_answer' => 1,
            'question_id' => 2
        ]);
        DB::table('answer')->insert([
            'answer' => 8,
            'correct_answer' => 0,
            'question_id' => 2
        ]);  
        DB::table('answer')->insert([
            'answer' => 12,
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
        DB::table('answer')->insert([
            'answer' => 'Ger',
            'correct_answer' => 1,
            'question_id' => 4
        ]);  
        DB::table('answer')->insert([
            'answer' => 'Erco',
            'correct_answer' => 0,
            'question_id' => 4
        ]);
        DB::table('answer')->insert([
            'answer' => 'Erik',
            'correct_answer' => 1,
            'question_id' => 4
        ]);  
        DB::table('answer')->insert([
            'answer' => 'Pascal',
            'correct_answer' => 0,
            'question_id' => 4
        ]); 

        DB::table('answer')->insert([
            'answer' => 'Frouke',
            'correct_answer' => 1,
            'question_id' => 5
        ]);  
        DB::table('answer')->insert([
            'answer' => 'Peter',
            'correct_answer' => 0,
            'question_id' => 5
        ]);
        DB::table('answer')->insert([
            'answer' => 'Eefje',
            'correct_answer' => 0,
            'question_id' => 5
        ]);  
        DB::table('answer')->insert([
            'answer' => 'Nina',
            'correct_answer' => 0,
            'question_id' => 5
        ]); 

        DB::table('answer')->insert([
            'answer' => 'Arno',
            'correct_answer' => 0,
            'question_id' => 6
        ]);  
        DB::table('answer')->insert([
            'answer' => 'Dion',
            'correct_answer' => 0,
            'question_id' => 6
        ]);
        DB::table('answer')->insert([
            'answer' => 'Erik',
            'correct_answer' => 1,
            'question_id' => 6
        ]);  
        DB::table('answer')->insert([
            'answer' => 'Gitta',
            'correct_answer' => 0,
            'question_id' => 6
        ]); 

        DB::table('answer')->insert([
            'answer' => 6,
            'correct_answer' => 1,
            'question_id' => 7
        ]);  
        DB::table('answer')->insert([
            'answer' => 7,
            'correct_answer' => 0,
            'question_id' => 7
        ]);
        DB::table('answer')->insert([
            'answer' => 8,
            'correct_answer' => 0,
            'question_id' => 7
        ]);  
        DB::table('answer')->insert([
            'answer' => 9,
            'correct_answer' => 0,
            'question_id' => 7
        ]); 
    }
}
