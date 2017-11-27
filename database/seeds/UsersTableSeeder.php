<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Natchapol',
            'username' => 'newnew01',
            'email' => 'newnew01@gmail.com',
            'password' => Hash::make('111111'),
            'mobile_no' => '0908939810',
            'branch_id' => 1,
            'role_id' => 1
        ]);

    }
}
