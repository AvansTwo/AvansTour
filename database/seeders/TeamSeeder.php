<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->insert([
            'team_name' => 'Script serpents',
            'tour_id' => 1,
            'team_identifier' => 'RAXY4XmITwkoEfNnZcwBggjbeKfzwD',
            'start_time' => '2022-06-21 12:37:33',
            'end_time' => '2022-06-21 16:52:40',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Team B',
            'tour_id' => 2,
            'team_identifier' => 'RAXY4XmI3feeff4wBggjbeKfzwD',
            'start_time' => '2022-06-21 12:47:53',
            'end_time' => '2022-06-21 15:52:50',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Team C',
            'tour_id' => 3,
            'team_identifier' => 'RAXY4Xm5rf4f4eggjbeKfzwD',
            'start_time' => '2022-06-21 13:12:23',
            'end_time' => '2022-06-21 16:34:46',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Team D',
            'tour_id' => 4,
            'team_identifier' => 'RAXY4XmI3feeff4wBggjbeKfzwD',
            'start_time' => '2022-06-21 13:30:33',
            'end_time' => '2022-06-21 14:52:21',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Team E',
            'tour_id' => 5,
            'team_identifier' => 'RAXY4XmI9iwdjicjewBggjbeKfzwD',
            'start_time' => '2022-06-21 12:37:33',
            'end_time' => '2022-06-21 16:12:43',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
