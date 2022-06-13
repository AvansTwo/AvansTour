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
            'category_name' => 'Informatica',
        ]);
        DB::table('category')->insert([
            'category_name' => 'Mechatronica',
        ]);
        DB::table('category')->insert([
            'category_name' => 'Werktuigbouwkunde',
        ]);
        DB::table('category')->insert([
            'category_name' => 'Technische informatica',
        ]);
        DB::table('category')->insert([
            'category_name' => 'Industrial Engineering & Management',
        ]);
        DB::table('category')->insert([
            'category_name' => 'Business IT & Management',
        ]);
        DB::table('category')->insert([
            'category_name' => 'Elektrotechniek',
        ]);
        DB::table('category')->insert([
            'category_name' => 'Technische Bedrijfskunde',
        ]);
    }
}
