<?php


namespace App\Modules\KanBan\Core\Domain\Service;

use App\Modules\KanBan\Core\Domain\Model\Staff;

interface MailtrapServiceInterface
{
    public function sendStaffWelcomeEmail(Staff $staff);
}
