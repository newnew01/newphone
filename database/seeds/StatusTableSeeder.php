<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'สำเร็จ',
            'ล้มเหลว',
            'ระหว่างขนส่ง'
        ];

        foreach ($status as $s){
            DB::table('status')->insert([
                'status_name' => $s
            ]);
        }
    }
}
