<?php


namespace App\Modules\KanBan\Presentation\Controller;


use App\Exceptions\KanBanException;
use App\Modules\KanBan\Core\Application\Service\Staff\DeleteStaff\DeleteStaffRequest;
use App\Modules\KanBan\Core\Application\Service\Staff\DeleteStaff\DeleteStaffService;
use App\Modules\KanBan\Core\Application\Service\Staff\ListStaff\ListStaffRequest;
use App\Modules\KanBan\Core\Application\Service\Staff\ListStaff\ListStaffService;
use Throwable;

class StaffController
{
    public function listStaff($business_id, $outlet_id)
    {
        $input = new ListStaffRequest($business_id, $outlet_id);
        /** @var ListStaffService $service */
        $service = resolve(ListStaffService::class);

        try {
            $staffs = $service->execute($input);
        } catch (KanBanException $e) {
            if ($e->getCode() == 101) {
                return redirect()->back()->with('alert', 'Access Not Authorized');
            }
            return redirect()->back()->with('alert', 'Failed To Get Staff');
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Failed To Get Staff');
        }


        return view('KanBan::staff.index', compact('staffs'));
    }

    public function deleteStaff($business_id, $outlet_id, $staff_id)
    {
        $input = new DeleteStaffRequest($business_id, $outlet_id, $staff_id);
        /** @var DeleteStaffService $service */
        $service = resolve(DeleteStaffService::class);

        try {
            $service->execute($input);
        } catch (KanBanException $e) {
            if ($e->getCode() == 102 || $e->getCode() == 103) {
                return redirect()->back()->with('alert', 'Access Not Authorized');
            }
            return redirect()->back()->with('alert', 'Failed To Delete Staff');
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Failed To Delete Staff');
        }

        return redirect()->back()->with('message', 'staff deleted successfully');
    }
}
