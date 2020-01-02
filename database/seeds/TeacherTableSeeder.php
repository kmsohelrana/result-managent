<?php

use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'name' => 'Abdus Salam',
            'email' => 'salam@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
