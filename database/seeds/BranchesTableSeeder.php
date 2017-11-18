<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            'นิวโฟนแม่ทา',
            'นิวโฟนบ้านโฮ่ง',
            'เอสเคแม่ทา',
            'เอสเคบ้านแซม',
            'เอสเคบ้านโฮ่ง'
        ];

        foreach ($branches as $branch){
            DB::table('branches')->insert([
                'branch_name' => $branch
            ]);
        }
    }
}
