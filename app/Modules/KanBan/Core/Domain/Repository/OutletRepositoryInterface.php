<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Outlet;

interface OutletRepositoryInterface
{
    public function storeOutlet(Outlet $outlet);

    public function getOutletByOutletId(int $outlet_id);

    public function listOutlet();

    public function deleteOutletById(int $outlet_id);
}
