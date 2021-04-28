<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Owner;

class OwnerRepository implements \App\Modules\KanBan\Core\Domain\Repository\OwnerRepositoryInterface
{

    public function getOwnerByEmail(string $email)
    {
        return Owner::where('email', $email)->first();
    }

}
