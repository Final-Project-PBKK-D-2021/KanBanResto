<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Menu;
use App\Modules\KanBan\Core\Domain\Model\MenuProduct;
use App\Modules\KanBan\Core\Domain\Repository\MenuRepositoryInterface;

class MenuRepository implements MenuRepositoryInterface
{

    public function getMenuById($id)
    {
        return Menu::find($id);
    }

    public function getListProductById($id)
    {
        return MenuProduct::where('menu_id', $id)->get();
    }

    public function persist(Menu $menu, array $product_ids)
    {
        $menu->save();

        $menu_tmp = Menu::where('name', $menu->name)->first();
        foreach($product_ids as $product_id) {
            $menu_tmp->products()->attach($product_id);
        }
    }

    public function listMenuByBusinessId($business_id)
    {
        return Menu::where('business_id', $business_id)->get();
    }

    public function deleteMenuById($id)
    {
        Menu::where('id', $id)->delete();
        $this->resetMenuProductById($id);
    }

    public function resetMenuProductById($id)
    {
        MenuProduct::where('menu_id',$id)->delete();
    }
}
