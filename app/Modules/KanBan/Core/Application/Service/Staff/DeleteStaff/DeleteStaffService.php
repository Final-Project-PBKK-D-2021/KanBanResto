<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\DeleteStaff;


use App\Exceptions\KanBanException;
use App\Modules\KanBan\Core\Domain\Repository\StaffRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class DeleteStaffService
{
    private StaffRepositoryInterface $staff_repository;

    /**
     * DeleteStaffService constructor.
     * @param StaffRepositoryInterface $staff_repository
     */
    public function __construct(StaffRepositoryInterface $staff_repository)
    {
        $this->staff_repository = $staff_repository;
    }

    public function execute(DeleteStaffRequest $request)
    {
        $owner = Auth::guard('owner')->user();
        $business = $owner->businesses()->where('id', $request->getBusinessId());

        //Sementara karena belom di tata
//        $business = Business::where('id', $request->getBusinessId())->first();

        $outlet = $business->outlets()->where('id', $request->getOutletId())->first();

        if (!$outlet) {
            throw new KanBanException('Outlet doesn\'t exist', 102);
        }

        $staff = $outlet->staffs()->where('staff_id', $request->getStaffId())->first();

        if (!$staff) {
            throw new KanBanException('Staff doesn\'t exist', 103);
        }

        $this->staff_repository->deleteStaff($staff);
    }

}
