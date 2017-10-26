<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'โทรศัพท์มือถือ',
            'สายชาจ',
            'ลำโพง',
            'อุปกรณ์เสริมอื่นๆ'];

        for($i=0;$i<count($categories);$i++){
            DB::table('categories')->insert([
                'cate_name' => $categories[$i]
            ]);
        }
    }
}
