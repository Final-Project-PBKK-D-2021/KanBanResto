<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\KanBan\Core\Domain\Model\Business;
use App\Modules\KanBan\Core\Domain\Model\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business = Business::where('name', 'PBBB')->first();

        Menu::create(
            [
                'name' => 'Menu Fast Rame-Rame',
                'description' => 'Segala jenis makanan yang cara penyajiannya cepat karena sebelumnya sudah mengalami proses pengolahan tahap awal',
                'business_id' => $business->id
            ]
        );
        
        Menu::create(
            [
                'name' => 'Menu Nusantara Maknyuss',
                'description' => 'Segala jenis makanan khas Nusantara',
                'business_id' => $business->id
            ]
        );
    }
}
