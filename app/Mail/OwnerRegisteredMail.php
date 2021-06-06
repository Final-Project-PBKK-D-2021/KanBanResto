<?php

namespace App\Mail;

use App\Modules\KanBan\Core\Domain\Model\Owner;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OwnerRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    private Owner $owner;

    /**
     * OwnerRegisteredMail constructor.
     * @param Owner $owner
     */
    public function __construct(Owner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kanbanresto@gmail.com')->markdown('owner.mail.welcome')->with(
            [
                'name' => $this->owner->name,
                'email' => $this->owner->email
            ]
        );
    }
}
