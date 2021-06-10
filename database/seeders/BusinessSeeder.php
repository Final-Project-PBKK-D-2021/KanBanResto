<?php

namespace Database\Seeders;

use App\Modules\KanBan\Core\Domain\Model\Business;
use App\Modules\KanBan\Core\Domain\Model\Owner;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = Owner::where('email', 'frederickwilliamedlim@gmail.com')->first();

        Business::create(
            [
                'name' => 'PBBB',
                'description' => 'Penjualan Barang Barang Berguna',
                'since' => 2021,
                'owner_name' => $owner->name,
                'owner_id' => $owner->owner_id
            ]
        );
        Business::create(
            [
                'name' => 'PALUGADA',
                'description' => 'Penjualan Barang Barang Yang Kamu Inginkan',
                'since' => 2021,
                'owner_name' => $owner->name,
                'owner_id' => $owner->owner_id
            ]
        );
        $owner = Owner::where('email', 'araiilieva@gmail.com')->first();

        Business::create(
            [
                'name' => 'UShop',
                'description' => 'Penjualan Barang Barang Kamu',
                'since' => 2021,
                'owner_name' => $owner->name,
                'owner_id' => $owner->owner_id
            ]
        );
        Business::create(
            [
                'name' => 'PALUNGAKADA',
                'description' => 'Penjualan Barang Barang Yang Tidak Kamu Inginkan',
                'since' => 2021,
                'owner_name' => $owner->name,
                'owner_id' => $owner->owner_id
            ]
        );
    }
}
