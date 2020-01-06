<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
           [
               'name' => 'Teacher',
               'email' => 'teacher@gmail.com',
               'phone' => '01674961086',
               'gender' => 'male',
               'password' => bcrypt('12345678')
           ],
            [
                'name' => 'Student',
                'email' => 'student@gmail.com',
                'phone' => '01515608410',
                'gender' => 'female',
                'password' => bcrypt('12345678')
            ],
        ]);
    }
}
