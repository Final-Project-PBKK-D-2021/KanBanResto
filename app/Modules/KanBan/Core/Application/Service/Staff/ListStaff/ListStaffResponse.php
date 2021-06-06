<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\ListStaff;



class ListStaffResponse
{
    private int $id;
    private string $name;
    private string $email;
    private string $staff_role;

    /**
     * ListStaffResponse constructor.
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $staff_role
     */
    public function __construct(int $id, string $name, string $email, string $staff_role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->staff_role = $staff_role;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getStaffRole(): string
    {
        return $this->staff_role;
    }
}
