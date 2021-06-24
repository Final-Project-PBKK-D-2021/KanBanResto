<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Business;
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

    public function listBusiness()
    {
        return Business::all();
    }

    public function deleteBusinessById($id)
    {
        Business::where('id', $id)->delete();
    }
}
