<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Business;

interface BusinessRepositoryInterface
{
    public function getBusinessById($id);

    public function persist(Business $business);

    public function listBusiness();

    public function deleteBusinessById($id);
}