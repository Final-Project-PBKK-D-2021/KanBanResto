<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Outlet;
use App\Modules\KanBan\Core\Domain\Repository\OutletRepositoryInterface;

class OutletRepository implements OutletRepositoryInterface
{

    public function storeOutlet(Outlet $outlet)
    {
        $outlet->save();
    }

    public function getOutletByOutletId(int $outlet_id)
    {
        return Outlet::where('id', $outlet_id)->first();
    }
}
