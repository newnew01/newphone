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
                'created_at' => NULL,
                'updated_at' => NULL,
                'cate_name' => 'โทรศัพท์มือถือ',
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'cate_name' => 'สายชาจ',
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'cate_name' => 'ลำโพง',
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'cate_name' => 'อุปกรณ์เสริมอื่นๆ',
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => '2017-12-11 07:18:56',
                'updated_at' => '2017-12-11 07:18:56',
                'cate_name' => 'TEST',
            ),
        ));
        
        
    }
}