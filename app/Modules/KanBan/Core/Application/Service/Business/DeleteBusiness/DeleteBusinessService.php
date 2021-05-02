<?php


namespace App\Modules\KanBan\Core\Application\Service\Business\DeleteBusiness;


use App\Modules\KanBan\Core\Domain\Repository\BusinessRepositoryInterface;

class DeleteBusinessService
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

    public function execute(DeleteBusinessRequest $request) 
    {
        $this->business_repository->deleteBusinessById($request->getId());
    }

}