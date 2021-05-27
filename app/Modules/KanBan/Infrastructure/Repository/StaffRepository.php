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

    public function getStaffByUsername(string $username)
    {
        return Staff::where('username', $username)->first();
    }
}
