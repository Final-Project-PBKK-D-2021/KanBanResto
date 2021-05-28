<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\ListStaff;


class ListStaffResponse
{
    private int $id;
    private string $name;
    private string $username;
    private string $staff_role;

    /**
     * ListStaffResponse constructor.
     * @param int $id
     * @param string $name
     * @param string $username
     * @param string $staff_role
     */
    public function __construct(int $id, string $name, string $username, string $staff_role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->staff_role = $staff_role;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getStaffRole(): string
    {
        return $this->staff_role;
    }
}
