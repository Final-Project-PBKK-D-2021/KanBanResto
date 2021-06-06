<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Staff;

interface StaffRepositoryInterface
{
    public function storeStaff(Staff $staff);

    public function getStaffByEmail(string $email);

    public function deleteStaffById(int $id);

    public function deleteStaff(Staff $staff);
}
