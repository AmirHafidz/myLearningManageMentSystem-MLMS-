<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leave_statuses')->insert([
            ['name'=>'Pending','description'=>'The application still pending and waiting response by admin.'],
            ['name'=>'Approved','description'=>'The application is being approved by admin.'],
            ['name'=>'Rejected','description'=>'The application is being rejected by admin.'],
        ]);
    }
}
