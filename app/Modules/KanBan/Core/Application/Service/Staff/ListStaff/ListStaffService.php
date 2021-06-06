<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\ListStaff;


use App\Exceptions\KanBanException;
use App\Modules\KanBan\Core\Domain\Model\Business;

class ListStaffService
{
    public function execute(ListStaffRequest $request)
    {
//        $owner = Auth::guard('owner')->user();
//        $business = $owner->businesses()->where('id', $request->getBusinessId());

        //Sementara karena belom di tata
        $business = Business::where('id', $request->getBusinessId())->first();
        $outlet = $business->outlets()->where('id', $request->getOutletId())->first();

        if (!$outlet) {
            throw new KanBanException('Outlet not exist', 101);
        }

        $response = [];
        foreach ($outlet->staffs as $staff) {
            $response[] = new ListStaffResponse(
                $staff->staff_id,
                $staff->name,
                $staff->email,
                $staff->staff_role
            );
        }

        return $response;
    }
}
