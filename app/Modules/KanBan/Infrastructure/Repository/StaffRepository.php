<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Staff;
use App\Modules\KanBan\Core\Domain\Repository\StaffRepositoryInterface;

class StaffRepository implements StaffRepositoryInterface
{

    public function storeStaff(Staff $staff)
    {
        $staff->save();
    }

    public function getStaffByEmail(string $email)
    {
        return Staff::where('email', $email)->first();
    }

    public function deleteStaffById(int $id)
    {
        Staff::where('staff_id', $id)->first()->delete();
    }

    public function deleteStaff(Staff $staff)
    {
        $staff->delete();
    }
}
