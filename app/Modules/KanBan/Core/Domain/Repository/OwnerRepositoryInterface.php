<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Owner;

interface OwnerRepositoryInterface
{
    public function storeOwner(Owner $owner);

    public function getOwnerByEmail(string $email);
}
