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
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$axZZcsu7nyU1iCyDkolWRec6rVxY1FzU./m/9FiWNUDFymiGqau7W',
                'remember_token' => 'j4s9RWgsKMVUeeozMpUR5DCqQ9zFhzFNB7OUeu8M8txNg2fER0MunaZ3vvw2',
                'settings' => NULL,
                'created_at' => '2023-03-15 13:19:36',
                'updated_at' => '2023-03-15 13:19:36',
            ),
        ));
        
        
    }
}