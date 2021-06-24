<?php


namespace App\Modules\KanBan\Core\Application\Service\API\Owner\OwnerLogin;


use App\Exceptions\KanBanException;
use App\Modules\KanBan\Core\Domain\Repository\OwnerRepositoryInterface;
use Illuminate\Support\Facades\Hash;


class OwnerLoginService
{
    private OwnerRepositoryInterface $owner_repository;

    /**
     * OwnerLoginService constructor.
     * @param OwnerRepositoryInterface $owner_repository
     */
    public function __construct(OwnerRepositoryInterface $owner_repository)
    {
        $this->owner_repository = $owner_repository;
    }

    /**
     * @throws KanBanException
     */
    public function execute(OwnerLoginRequest $request): OwnerLoginResponse
    {
        $owner = $this->owner_repository->getOwnerByEmail($request->getEmail());

        if (!$owner || !Hash::check($request->getPassword(), $owner->password)) {
            throw new KanBanException('Account doesn\'t exist or the credential maybe invalid', 104);
        }

        return new OwnerLoginResponse(
            $owner->createToken($owner->name)->plainTextToken
        );
    }
}
