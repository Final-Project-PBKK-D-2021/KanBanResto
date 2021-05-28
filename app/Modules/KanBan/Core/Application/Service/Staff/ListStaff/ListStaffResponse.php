<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\ListStaff;


use JsonSerializable;

class ListStaffResponse implements JsonSerializable
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

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'id' => $this->id,
        ]
    }
}
