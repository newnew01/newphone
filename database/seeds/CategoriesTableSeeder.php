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
                'created_at' => '2017-12-28 08:03:33',
                'updated_at' => '2017-12-28 08:03:33',
                'cate_name' => 'โทรศัพท์',
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2017-12-28 08:04:00',
                'updated_at' => '2017-12-28 08:04:00',
                'cate_name' => 'ฟิล์มกันรอย',
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2017-12-28 08:05:02',
                'updated_at' => '2017-12-28 08:05:02',
                'cate_name' => 'อุปกรณ์ชาร์จ',
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2017-12-28 08:05:19',
                'updated_at' => '2017-12-28 08:05:19',
                'cate_name' => 'หูฟัง',
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => '2017-12-28 11:29:52',
                'updated_at' => '2017-12-28 11:29:52',
                'cate_name' => 'ที่วางมือถือ',
            ),
        ));
        
        
    }
}