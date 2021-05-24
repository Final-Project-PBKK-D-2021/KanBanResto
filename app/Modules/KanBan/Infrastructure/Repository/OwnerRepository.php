<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Owner;
use App\Modules\KanBan\Core\Domain\Repository\OwnerRepositoryInterface;

class OwnerRepository implements OwnerRepositoryInterface
{
    public function storeOwner(Owner $owner)
    {
        $owner->save();
    }

    public function getOwnerByEmail(string $email)
    {
        return Owner::where('email', $email)->first();
    }
}
