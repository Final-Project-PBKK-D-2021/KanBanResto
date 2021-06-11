<?php

namespace Database\Seeders;

use App\Modules\KanBan\Core\Domain\Model\Business;
use App\Modules\KanBan\Core\Domain\Model\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business = Business::where('name', 'PBBB')->first();
        Product::create(
            [
                'name' => 'Nasi Goreng',
                'price' => '12000',
                'description' => 'Nasi Goreng dengan cita rasa nusantara',
                'badge'=> 'terlaris',
                'business_id' => $business->id
            ]
        );

        Product::create (
            [
                'name' => 'Ayam Goreng',
                'price' => '15000',
                'description' => 'Ayam goreng dengan nasi putih',
                'badge'=> 'terlaris',
                'business_id' => $business->id
            ]
        );

    }
}
