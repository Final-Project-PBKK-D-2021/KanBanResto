<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Menu;
use App\Modules\KanBan\Core\Domain\Repository\MenuRepositoryInterface;

class MenuRepository implements MenuRepositoryInterface
{

    public function getMenuById($id)
    {
        return Menu::where('id', $id)->first();
    }

    public function persist(Menu $menu)
    {
        $menu->save();
    }

    public function listMenu()
    {
        return Menu::paginate(10);
    }

    public function deleteMenuById($id)
    {
        Menu::where('id', $id)->delete();
    }
}
