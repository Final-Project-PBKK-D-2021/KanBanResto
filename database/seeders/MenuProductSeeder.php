<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\KanBan\Core\Domain\Model\MenuProduct;
use App\Modules\KanBan\Core\Domain\Model\Menu;
use App\Modules\KanBan\Core\Domain\Model\Product;

class MenuProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu1 = Menu::where('name', 'Menu Nusantara Maknyuss')->first();
        $menu2 = Menu::where('name', 'Menu Fast Rame-Rame')->first();
        $product1 = Product::where('name', 'Ayam Goreng')->first();
        $product2 = Product::where('name', 'Nasi Goreng')->first();
        
        MenuProduct::create(
            [
                'menu_id' => $menu1->id,
                'product_id' => $product1->id
            ]
        );

        MenuProduct::create(
            [
                'menu_id' => $menu1->id,
                'product_id' => $product2->id
            ]
        );

        MenuProduct::create(
            [
                'menu_id' => $menu2->id,
                'product_id' => $product2->id
            ]
        );
    }
}
