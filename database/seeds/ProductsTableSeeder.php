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
