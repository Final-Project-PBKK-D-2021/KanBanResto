<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


interface OwnerRepositoryInterface
{
    public function getOwnerByEmail(string $email);
}
