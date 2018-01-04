<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2017-12-28 08:06:31',
                'updated_at' => '2017-12-28 08:06:31',
                'brand_name' => 'VIVO',
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2017-12-28 08:06:37',
                'updated_at' => '2017-12-28 08:06:37',
                'brand_name' => 'OPPO',
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2017-12-28 08:06:54',
                'updated_at' => '2017-12-28 08:06:54',
                'brand_name' => 'Huawei',
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2017-12-28 08:07:05',
                'updated_at' => '2017-12-28 08:07:05',
                'brand_name' => 'Samsung',
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => '2017-12-28 08:07:16',
                'updated_at' => '2017-12-28 08:07:16',
                'brand_name' => 'GIONEE',
            ),
            5 => 
            array (
                'id' => 6,
                'created_at' => '2017-12-28 08:07:23',
                'updated_at' => '2017-12-28 08:07:23',
                'brand_name' => 'True',
            ),
            6 => 
            array (
                'id' => 7,
                'created_at' => '2017-12-28 08:07:30',
                'updated_at' => '2017-12-28 08:07:30',
                'brand_name' => 'Wiko',
            ),
            7 => 
            array (
                'id' => 8,
                'created_at' => '2017-12-28 08:07:42',
                'updated_at' => '2017-12-28 08:07:42',
                'brand_name' => 'Cherry Mobile',
            ),
            8 => 
            array (
                'id' => 9,
                'created_at' => '2017-12-28 08:07:52',
                'updated_at' => '2017-12-28 08:07:52',
                'brand_name' => 'Nokia',
            ),
            9 => 
            array (
                'id' => 10,
                'created_at' => '2017-12-28 08:08:06',
                'updated_at' => '2017-12-28 08:08:06',
                'brand_name' => 'AIS',
            ),
            10 => 
            array (
                'id' => 11,
                'created_at' => '2017-12-28 08:09:00',
                'updated_at' => '2017-12-28 08:09:00',
                'brand_name' => 'Apple',
            ),
            11 => 
            array (
                'id' => 12,
                'created_at' => '2017-12-28 08:09:22',
                'updated_at' => '2017-12-28 08:09:22',
                'brand_name' => 'อื่นๆ',
            ),
            12 => 
            array (
                'id' => 13,
                'created_at' => '2017-12-28 09:22:13',
                'updated_at' => '2017-12-28 09:22:13',
                'brand_name' => 'I-MOBILE',
            ),
            13 => 
            array (
                'id' => 14,
                'created_at' => '2017-12-28 09:39:55',
                'updated_at' => '2017-12-28 09:39:55',
                'brand_name' => 'HOCO',
            ),
            14 => 
            array (
                'id' => 15,
                'created_at' => '2017-12-28 09:40:26',
                'updated_at' => '2017-12-28 09:40:26',
                'brand_name' => 'SOULMATE',
            ),
            15 => 
            array (
                'id' => 16,
                'created_at' => '2017-12-28 09:40:51',
                'updated_at' => '2017-12-28 09:40:51',
                'brand_name' => 'EARLDOM',
            ),
            16 => 
            array (
                'id' => 17,
                'created_at' => '2017-12-28 09:41:21',
                'updated_at' => '2017-12-28 09:41:21',
                'brand_name' => 'FOCUS',
            ),
        ));
        
        
    }
}