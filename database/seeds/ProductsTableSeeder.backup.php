<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'โทรศัพท์มือถือ',
            'brand_id' => 1,
            'model' => 'Y53',
            'category_id' => 1,
            'description' => 'โทรศัพท์สมาทร์โฟนรุ่นใหม่ล่าสุด',
            'barcode' => '111',
            'type_sn' => 1,
            'image' => '/assets/images/products/product-1.jpg'

        ]);

        DB::table('products')->insert([
            'product_name' => 'โทรศัพท์มือถือ',
            'brand_id' => 2,
            'model' => 'A37',
            'category_id' => 1,
            'description' => 'โทรศัพท์สมาทร์โฟนรุ่นใหม่ล่าสุด',
            'barcode' => '222',
            'type_sn' => 1,
            'image' => '/assets/images/products/product-2.jpg'
        ]);

        DB::table('products')->insert([
            'product_name' => 'สายชาจ USB',
            'brand_id' => 3,
            'category_id' => 4,
            'description' => 'โทรศัพท์สมาทร์โฟนรุ่นใหม่ล่าสุด',
            'barcode' => '333',
            'type_sn' => 0,
            'image' => '/assets/images/products/product-3.jpg'
        ]);



        for($i=0;$i<20;$i++){
            DB::table('products')->insert([
                'product_name' => str_random(15),
                'brand_id' => random_int(1,10),
                'model' => str_random(5),
                'category_id' => random_int(1,3),
                'description' => str_random(30),
                'barcode' => random_int(10000,99999),
                'type_sn' => (rand(0,1) == 1)

            ]);

        }
    }
}
