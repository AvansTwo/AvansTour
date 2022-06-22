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
            'team_name' => 'Team A',
            'tour_id' => 1,
            'team_identifier' => 'RAXY4XmITwkoEfNnZcwBggjbeKfzwD',
            'start_time' => '2022-06-21 12:37:33',
            'end_time' => '2022-06-21 16:52:40',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Data dummies',
            'tour_id' => 2,
            'team_identifier' => 'RAXY4XmI3feeff4wBggjbeKfzwD',
            'start_time' => '2022-06-21 12:47:53',
            'end_time' => '2022-06-21 15:52:50',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Beta blockers',
            'tour_id' => 3,
            'team_identifier' => 'RAXY4Xm5rf4f4eggjbeKfzwD',
            'start_time' => '2022-06-21 13:12:23',
            'end_time' => '2022-06-21 16:34:46',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Programmercels',
            'tour_id' => 4,
            'team_identifier' => 'RAXY4XmI3feeff4wBggjbeKfzwD',
            'start_time' => '2022-06-21 13:30:33',
            'end_time' => '2022-06-21 14:52:21',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Paki bois',
            'tour_id' => 5,
            'team_identifier' => 'RAXY4XmI9iwdjicjewBggjbeKfzwD',
            'start_time' => '2022-06-21 12:37:33',
            'end_time' => '2022-06-21 16:12:43',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'College Dropouts',
            'tour_id' => 6,
            'team_identifier' => 'RAXY44f84jfjbeKfzwD',
            'start_time' => '2022-03-21 14:00:00',
            'end_time' => '2022-03-21 16:12:43',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'The Weakest Links',
            'tour_id' => 7,
            'team_identifier' => 'RAXY443rfreggjbeKfzwD',
            'start_time' => '2022-03-21 13:00:00',
            'end_time' => '2022-03-21 16:54:56',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Kleine kinderen',
            'tour_id' => 1,
            'team_identifier' => 'RAXY4Xm75434t5ggjbeKfzwD',
            'start_time' => '2021-06-21 14:00:00',
            'end_time' => '2021-06-21 15:23:43',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => 'Vlugge vakkenvullers',
            'tour_id' => 1,
            'team_identifier' => 'RAXY4X4533jbeKfzwD',
            'start_time' => '2021-06-21 12:00:00',
            'end_time' => '2021-06-21 15:40:10',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('team')->insert([
            'team_name' => "Jankende Jekko's",
            'tour_id' => 1,
            'team_identifier' => 'RAXY4X4533jbeKfzwD',
            'start_time' => '2021-06-21 14:10:00',
            'end_time' => '2021-06-21 15:23:33',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
