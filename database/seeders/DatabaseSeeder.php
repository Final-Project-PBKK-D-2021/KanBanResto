<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OwnerSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(OutletSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuProductSeeder::class);
    }
}
