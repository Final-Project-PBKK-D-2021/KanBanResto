<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Outlet;

interface OutletRepositoryInterface
{
    public function storeOutlet(Outlet $outlet);

    public function getOutletByOutletId($id);

    public function listOutletByBusinessId($business_id);

    public function deleteOutletById($id);

    public function listOutlet();
}
