<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\StaffLogin;


class StaffLoginRequest
{
    private string $email;
    private string $password;

    /**
     * StaffLoginRequest constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
