<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genre')->delete();
        
        \DB::table('genre')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fiction',
                'created_at' => '2023-02-15 19:51:51',
                'updated_at' => '2023-02-15 19:51:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Novel',
                'created_at' => '2023-02-15 19:51:51',
                'updated_at' => '2023-02-15 19:51:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Mystery',
                'created_at' => '2023-02-15 19:52:00',
                'updated_at' => '2023-02-15 19:52:00',
            ),
        ));
        
        
    }
}