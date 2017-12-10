<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'ผู้ดูแลระบบ',
            'ผู้จัดการ',
            'ฝ่ายขาย',
            'ผู้จัดการสต๊อค'];

        for($i=0;$i<count($roles);$i++){
            DB::table('roles')->insert([
                'role_name' => $roles[$i]
            ]);
        }
    }
}
