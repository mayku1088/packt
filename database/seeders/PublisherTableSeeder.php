<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PublisherTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('publisher')->delete();
        
        \DB::table('publisher')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Packt',
                'created_at' => '2023-02-15 19:56:49',
                'updated_at' => '2023-02-15 19:56:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Penguin Random House India',
                'created_at' => '2023-02-15 19:56:49',
                'updated_at' => '2023-02-15 19:56:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pan Macmillan India',
                'created_at' => '2023-02-15 19:57:04',
                'updated_at' => '2023-02-15 19:57:04',
            ),
        ));
        
        
    }
}