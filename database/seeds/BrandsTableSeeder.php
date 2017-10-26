<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
        'VIVO',
        'OPPO',
        'HUAWEI',
        'GIONEE',
        'WIKO',
        'SAMSUNG',
        'LG',
        'ASUS',
        'NOKIA',
        'APPLE'];

        for($i=0;$i<count($brands);$i++){
            DB::table('brands')->insert([
                'brand_name' => $brands[$i]
            ]);
        }
    }
}
