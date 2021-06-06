<?php


namespace App\Modules\KanBan\Infrastructure\Service;


use App\Mail\StaffRegisteredMail;
use App\Modules\KanBan\Core\Domain\Model\Staff;
use App\Modules\KanBan\Core\Domain\Service\MailtrapServiceInterface;
use Illuminate\Support\Facades\Mail;

class MailtrapService implements MailtrapServiceInterface
{
    public function sendStaffWelcomeEmail(Staff $staff)
    {
        Mail::mailer('smtp')
            ->to($staff->email)
            ->send(new StaffRegisteredMail($staff));
    }
}
