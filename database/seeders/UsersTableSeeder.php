<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'test',
                'email' => 'test@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$04$2LO15c.v8YIQv/8QJXPk3u3HUtn5G2pm4g4gLesWSB4C2L1XCXnkq',
                'remember_token' => NULL,
                'created_at' => '2021-01-16 11:02:18',
                'updated_at' => '2021-01-16 11:02:18',
            ),
        ));
        
        
    }
}