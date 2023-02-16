<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterStudent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_students')->insert([
            ['user_id' => 16,'class_id'=>1],
            ['user_id' => 17,'class_id'=>1],
            ['user_id' => 18,'class_id'=>2],
            ['user_id' => 19,'class_id'=>2],
            ['user_id' => 20,'class_id'=>3],
            ['user_id' => 21,'class_id'=>3],
            ['user_id' => 22,'class_id'=>1],
            ['user_id' => 23,'class_id'=>1],
            ['user_id' => 24,'class_id'=>2],
            ['user_id' => 25,'class_id'=>2],
            ['user_id' => 26,'class_id'=>3],
            ['user_id' => 27,'class_id'=>3],
        ]);
    }
}
