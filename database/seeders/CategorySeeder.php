<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'category_name' => 'Batieboys',
        ]);
        DB::table('category')->insert([
            'category_name' => 'Klaas en de boys',
        ]);
        DB::table('category')->insert([
            'category_name' => 'Drerries',
        ]);
    }
}
