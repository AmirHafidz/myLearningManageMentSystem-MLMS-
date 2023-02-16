<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_trainers')->insert([
            ['trainer_id'=>,'title'=>,'description'=>'','date_start'=>,'date_end'=>,'time_start'=>,'time_end'=>],
        ]);
    }
}
