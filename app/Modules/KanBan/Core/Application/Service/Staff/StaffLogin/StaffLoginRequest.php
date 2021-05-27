<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\StaffLogin;


class StaffLoginRequest
{
    private string $username;
    private string $password;

    /**
     * StaffLoginRequest constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
