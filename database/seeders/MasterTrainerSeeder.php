<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterTrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_trainers')->insert([

            ['user_id'=>4],
            ['user_id'=>5],
            ['user_id'=>6],
            ['user_id'=>7],
            ['user_id'=>8],
            ['user_id'=>9],
            ['user_id'=>10],
            ['user_id'=>11],
            ['user_id'=>12],
            ['user_id'=>13],
            ['user_id'=>14],
            ['user_id'=>15],
        ]);
    }
}
