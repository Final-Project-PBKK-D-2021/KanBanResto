<?php


namespace App\Modules\KanBan\Core\Application\Service\Business\EditBusiness;


use App\Modules\KanBan\Core\Domain\Repository\BusinessRepositoryInterface;

class EditBusinessService
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

    public function execute(EditBusinessRequest $request) 
    {
        $business = $this->business_repository->getBusinessById($request->getId());
        
        $business->name = $request->getName();
        $business->description = $request->getDescription();
        $business->since = $request->getSince();
        $business->owner_name = $request->getOwnerName();

        $this->business_repository->persist($business);
    }

}
