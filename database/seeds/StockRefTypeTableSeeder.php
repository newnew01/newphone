<?php

use Illuminate\Database\Seeder;

class StockRefTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'รับสินค้าเข้า',
            'โอนสินค้า',
            'ขาย',
            'คืนสินค้า',
            'ส่งซ่อม'
        ];

        foreach ($types as $type){
            DB::table('stock_ref_type')->insert([
                'type_name' => $type
            ]);
        }
    }
}
