<?php

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_users')->insert([
            [
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'role_id' => 2,
                'user_id' => 2,
                'created_at' => \Carbon\Carbon::now(),
            ],


        ]);
    }
}
