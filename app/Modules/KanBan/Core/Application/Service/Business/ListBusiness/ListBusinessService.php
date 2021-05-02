<?php

namespace App\Modules\KanBan\Core\Application\Service\Business\ListBusiness;

use App\Modules\KanBan\Core\Domain\Repository\BusinessRepositoryInterface;

class ListBusinessService 
{
    private BusinessRepositoryInterface $business_repository;

    /**
     * BusinessService constructor.
     * @param BusinessRepositoryInterface business_repository
     */
    public function __construct(BusinessRepositoryInterface $business_repository)
    {
        $this->business_repository = $business_repository;
    }

    public function execute() 
    {
        $business = $this->business_repository->listBusiness();
        return $business;
    }
}
