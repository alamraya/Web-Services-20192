<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'women',
                'slug' => 'women',
                'created_at' => '2020-05-29 03:41:26',
                'updated_at' => '2020-05-31 04:37:35',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'man',
                'slug' => 'man',
                'created_at' => '2020-05-29 03:41:26',
                'updated_at' => '2020-05-31 04:37:51',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 1,
                'order' => 2,
                'name' => 'cosmetics',
                'slug' => 'cosmetics',
                'created_at' => '2020-05-31 04:38:14',
                'updated_at' => '2020-05-31 04:38:14',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'lipstics',
                'slug' => 'lipstics',
                'created_at' => '2020-05-31 04:38:36',
                'updated_at' => '2020-05-31 06:36:56',
            ),
            4 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 1,
                'name' => 'hat',
                'slug' => 'hat',
                'created_at' => '2020-05-31 06:38:03',
                'updated_at' => '2020-05-31 06:38:03',
            ),
            5 => 
            array (
                'id' => 7,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'hijab muslimah',
                'slug' => 'hijab-muslimah',
                'created_at' => '2020-05-31 06:39:02',
                'updated_at' => '2020-05-31 06:39:02',
            ),
        ));
        
        
    }
}