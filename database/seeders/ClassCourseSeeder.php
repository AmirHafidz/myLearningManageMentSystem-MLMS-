<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_courses')->insert([
            ['class_id'=>1,'course_id'=>3],
            ['class_id'=>1,'course_id'=>6],
            ['class_id'=>1,'course_id'=>4],
            ['class_id'=>2,'course_id'=>1],
            ['class_id'=>2,'course_id'=>10],
            ['class_id'=>2,'course_id'=>11],
            ['class_id'=>3,'course_id'=>8],
            ['class_id'=>3,'course_id'=>9],
            ['class_id'=>3,'course_id'=>10],
        ]);
    }
}
