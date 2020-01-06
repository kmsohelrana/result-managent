<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('courses')->insert([
            [
                'name' => 'Bangla',
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'English',
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Math',
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Social Science',
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
