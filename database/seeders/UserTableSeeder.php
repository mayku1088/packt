<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user')->delete();
        
        \DB::table('user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'packt',
                'email' => 'packt@gmail.com',
                'password' => '$2a$12$qA26y3UuPeXErgxhpHNBSu48NRJRdbUk4PdvSTs5TTtqOISJVuMFi',
                'created_at' => '2023-02-11 00:00:00',
                'updated_at' => '2023-02-11 00:00:00',
            ),
        ));
        
        
    }
}