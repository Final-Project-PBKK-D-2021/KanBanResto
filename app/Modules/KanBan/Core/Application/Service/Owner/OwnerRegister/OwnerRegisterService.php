<?php


namespace App\Modules\KanBan\Core\Application\Service\Owner\OwnerRegister;


use App\Modules\KanBan\Core\Domain\Model\Owner;
use App\Modules\KanBan\Core\Domain\Repository\OwnerRepositoryInterface;

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
        $owner = Owner::create(
            [
                'name' => $request->getName(),
                'email' => $request->getEmail(),
                'password' => $request->getPassword()
            ]
        );

        $this->owner_repository->storeOwner($owner);
    }
}
