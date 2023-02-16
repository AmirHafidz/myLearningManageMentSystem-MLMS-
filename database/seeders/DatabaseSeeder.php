<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MasterClass::class);
        $this->call(MasterStudent::class);
        $this->call(MasterTrainerSeeder::class);
        $this->call(MasterCourse::class);
        $this->call(ClassCourseSeeder::class);
        $this->call(PersonalDetailSeeder::class);
    }
}
