<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Menu;

interface MenuRepositoryInterface
{
    public function getMenuById($id);

    public function persist (Menu $menu);

    public function listMenu ();

    public function deleteMenuById($id);
}
