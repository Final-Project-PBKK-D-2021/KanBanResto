<?php


namespace App\Modules\KanBan\Infrastructure\Service;


use App\Mail\OwnerRegisteredMail;
use App\Modules\KanBan\Core\Domain\Model\Owner;
use App\Modules\KanBan\Core\Domain\Service\GMailServiceInterface;
use Illuminate\Support\Facades\Mail;

class GMailService implements GMailServiceInterface
{
    public function sendOwnerWelcomeEmail(Owner $owner)
    {
        Mail::mailer('gmail')
            ->to($owner->email)
            ->send(new OwnerRegisteredMail($owner));
    }
}
