<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            [
                'name' => 'teacher',
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'student',
                'created_at' => \Carbon\Carbon::now(),
            ],

        ]);
    }
}
