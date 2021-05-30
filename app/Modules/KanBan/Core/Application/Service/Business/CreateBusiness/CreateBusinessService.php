<?php

namespace App\Modules\KanBan\Core\Application\Service\Business\CreateBusiness;

use App\Modules\KanBan\Core\Domain\Model\Business;
use App\Modules\KanBan\Core\Domain\Repository\BusinessRepositoryInterface;

class CreateBusinessService 
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

    public function execute(CreateBusinessRequest $request) 
    {
        
        $business = Business::create(
            [
                'name' => $request->getName(),
                'description' => $request->getDescription(),
                'since' => $request->getSince(),
                'owner_name' => $request->getOwnerName(),
                'owner_id'=>$request->getOwnerID()
            ]
        );

        $this->business_repository->persist($business);
    }
}
