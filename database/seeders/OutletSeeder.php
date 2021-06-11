<?php

namespace Database\Seeders;

use App\Modules\KanBan\Core\Domain\Model\Business;
use App\Modules\KanBan\Core\Domain\Model\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business = Business::where('name', 'PBBB')->first();
        Outlet::create(
            [
                'nama_outlet' => 'PBBB - Outlet 1',
                'alamat_outlet' => 'Jalan Dharmahusada no.10',
                'no_telepon_outlet' => '031-8298787',
                'business_id'=> $business->id

            ]
        );

        Outlet::create (
            [
                'nama_outlet' => 'PBBB - Outlet 2',
                'alamat_outlet' => 'Jalan Kertajaya Indah no.23',
                'no_telepon_outlet' => '031-8235467',
                'business_id'=> $business->id
            ]
        );

    }
}
