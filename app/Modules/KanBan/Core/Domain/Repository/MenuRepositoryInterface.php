<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Menu;

interface MenuRepositoryInterface
{
    public function getMenuById($id);

    public function getListProductById($id);

    public function persist(Menu $menu, array $product_ids);

    public function listMenuByBusinessId($business_id);

    public function deleteMenuById($id);

    public function resetMenuProductById($id);
}
