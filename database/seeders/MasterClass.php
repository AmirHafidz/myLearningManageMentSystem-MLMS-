<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_classes')->insert([
            ['admin_id'=>1,'name'=>'Alpha','no_of_students'=>0],
            ['admin_id'=>2,'name'=>'Beta','no_of_students'=>0],
            ['admin_id'=>3,'name'=>'Gamma','no_of_students'=>0],
        ]);
    }
}
