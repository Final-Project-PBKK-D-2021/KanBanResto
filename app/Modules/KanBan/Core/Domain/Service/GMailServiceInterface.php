<?php


namespace App\Modules\KanBan\Core\Domain\Service;

use App\Modules\KanBan\Core\Domain\Model\Owner;

interface GMailServiceInterface
{
    public function sendOwnerWelcomeEmail(Owner $owner);
}
