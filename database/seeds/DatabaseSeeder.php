<?php

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
         $this->call(UserTableSeeder::class);
         $this->call(RoleTableSeeder::class);
         $this->call(RoleUserSeeder::class);
//         $this->call(TeacherTableSeeder::class);
         $this->call(CourseTableSeeder::class);
    }
}
