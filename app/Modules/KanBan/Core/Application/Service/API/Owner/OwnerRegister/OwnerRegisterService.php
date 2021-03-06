<?php


namespace App\Modules\KanBan\Core\Application\Service\API\Owner\OwnerRegister;


use App\Modules\KanBan\Core\Domain\Model\Owner;
use App\Modules\KanBan\Core\Domain\Repository\OwnerRepositoryInterface;
use App\Modules\KanBan\Core\Domain\Service\GMailServiceInterface;

class OwnerRegisterService
{
    private OwnerRepositoryInterface $owner_repository;

    /**
     * OwnerRegisterService constructor.
     * @param OwnerRepositoryInterface $owner_repository
     */
    public function __construct(OwnerRepositoryInterface $owner_repository)
    {
        $this->owner_repository = $owner_repository;
    }

    public function execute(OwnerRegisterRequest $request)
    {
        $owner = new Owner();

        $owner->name = $request->getName();
        $owner->email = $request->getEmail();
        $owner->password = $request->getPassword();

        /** @var GMailServiceInterface $service */
        $service = resolve(GMailServiceInterface::class);

        $service->sendOwnerWelcomeEmail($owner);

        $this->owner_repository->storeOwner($owner);
    }
}
