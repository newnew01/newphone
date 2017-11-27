<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(StockRefTypeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
