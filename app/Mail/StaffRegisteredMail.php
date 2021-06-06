<?php

namespace App\Mail;

use App\Modules\KanBan\Core\Domain\Model\Staff;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StaffRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    private Staff $staff;

    /**
     * StaffRegisteredMail constructor.
     * 
     * @param Staff $staff
     */
    public function __construct(Staff $staff)
    {

        $this->staff = $staff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('indriatifiqey16@gmail.com')->markdown('staff.mail.welcome')->with(
            [
                'name' => $this->staff->name,
                'email' => $this->staff->email
            ]
        );
    }
}
