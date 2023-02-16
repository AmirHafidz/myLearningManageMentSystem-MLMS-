<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Amirah','email'=>'admin1@mirha.com','password'=>Hash::make('admin'),'isAdmin'=>1,'role_id'=>1],
            ['name'=>'Maria','email'=>'admin2@mirha.com','password'=>Hash::make('admin'),'isAdmin'=>1,'role_id'=>1],
            ['name'=>'Aisyah','email'=>'admin3@mirha.com','password'=>Hash::make('admin'),'isAdmin'=>1,'role_id'=>1],
            
            ['name'=>'Ronaldo','email'=>'Ronaldo@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Zidane','email'=>'Zidane@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Riquelme','email'=>'Riquelme@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Casillas','email'=>'Casillas@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Beckham','email'=>'Beckham@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Ronaldinho','email'=>'Ronaldinho@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Henry','email'=>'Henry@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Aimar','email'=>'Aimar@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Raul','email'=>'Raul@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Owen','email'=>'Owen@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Keane','email'=>'Keane@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],
            ['name'=>'Maldini','email'=>'Maldini@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>2],

            ['name'=>'Messi','email'=>'Messi@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Neymar','email'=>'Neymar@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Mbappe','email'=>'Mbappe@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Haaland','email'=>'Haaland@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Pedri','email'=>'Pedri@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Jamal','email'=>'Jamal@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Kane','email'=>'Kane@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Valverde','email'=>'Valverde@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'HeungMin','email'=>'HeungMin@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Brandt','email'=>'Brandt@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Pogba','email'=>'Pogba@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
            ['name'=>'Chiesa','email'=>'Chiesa@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0,'role_id'=>3],
        ]);
    }
}
