<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Business;
use App\Modules\KanBan\Core\Domain\Model\Outlet;
use App\Modules\KanBan\Core\Domain\Model\Menu;
use App\Modules\KanBan\Core\Domain\Model\Product;
use App\Modules\KanBan\Core\Domain\Model\Staff;
use App\Modules\KanBan\Core\Domain\Repository\BusinessRepositoryInterface;

class BusinessRepository implements BusinessRepositoryInterface
{
    public function getBusinessById($id)
    {
        return Business::where('id', $id)->first();
    }

    public function persist(Business $business)
    {
        $business->save();
    }

    public function listBusinessByOwnerId($owner_id)
    {
        return Business::where('owner_id', $owner_id)->get();
    }

    public function listBusiness()
    {
        return Business::all();
    }

    public function deleteBusinessById($id)
    {
        Business::where('id', $id)->delete();
        Menu::where('business_id', $id)->delete();
        Product::where('business_id', $id)->delete();

        $outlet = Outlet::where('business_id', $id)->get();
        Staff::where('outlet_id', $outlet->id)->delete();
        Outlet::where('business_id', $id)->delete();
    }
}
