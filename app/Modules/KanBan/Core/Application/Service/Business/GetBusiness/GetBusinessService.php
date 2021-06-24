<?php


namespace App\Modules\KanBan\Core\Application\Service\Business\GetBusiness;


use App\Modules\KanBan\Core\Domain\Repository\BusinessRepositoryInterface;

class GetBusinessService
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

    public function execute(GetBusinessRequest $request)
    {
        $business = $this->business_repository->getBusinessById($request->getId());

        return new GetBusinessResponse(
            $business->id,
            $business->name,
            $business->description,
            $business->since,
            $business->owner_name
        );
    }
}
