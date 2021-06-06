<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\StaffRegister;


class StaffRegisterRequest
{
    private string $email;
    private string $name;
    private string $password;
    private string $staff_role;
    private int $outlet_id;

    /**
     * StaffRegisterRequest constructor.
     * @param string $email
     * @param string $name
     * @param string $password
     * @param string $staff_role
     * @param int $outlet_id
     */
    public function __construct(string $email, string $name, string $password, string $staff_role, int $outlet_id)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->staff_role = $staff_role;
        $this->outlet_id = $outlet_id;
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

    /**
     * @return string
     */
    public function getStaffRole(): string
    {
        return $this->staff_role;
    }

    /**
     * @return int
     */
    public function getOutletId(): int
    {
        return $this->outlet_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
