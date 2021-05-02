<?php


namespace App\Modules\KanBan\Core\Application\Service\Owner\OwnerLogin;


use App\Exceptions\KanBanException;
use App\Modules\KanBan\Core\Domain\Repository\OwnerRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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

    public function execute (OwnerLoginRequest $request){
        $owner = $this->owner_repository->getOwnerByEmail($request->getEmail());

        if (!$owner) {
            throw new KanBanException('User Does Not Exist', 100);
        }

        if ($owner->password === $request->getPassword()){
            Auth::guard('owner')->login($owner);
        }
    }
}
