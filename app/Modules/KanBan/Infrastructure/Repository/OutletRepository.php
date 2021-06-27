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

    public function getOutletByOutletId($id)
    {
        return Outlet::where('id', $id)->first();
    }

    public function listOutlet() 
    {
        return Outlet::all();
    }

    public function deleteOutletById($id)
    {
        Outlet::where('id', $id)->delete();
    }
}
