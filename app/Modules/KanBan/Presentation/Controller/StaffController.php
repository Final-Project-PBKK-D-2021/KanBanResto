<?php


namespace App\Modules\KanBan\Presentation\Controller;


use App\Exceptions\KanBanException;
use App\Modules\KanBan\Core\Application\Service\Staff\ListStaff\ListStaffRequest;
use App\Modules\KanBan\Core\Application\Service\Staff\ListStaff\ListStaffService;
use App\Modules\Shared\Mechanism\UnitOfWork;
use Throwable;

class StaffController
{
    private UnitOfWork $unit_of_work;

    /**
     * StaffController constructor.
     * @param UnitOfWork $unit_of_work
     */
    public function __construct(UnitOfWork $unit_of_work)
    {
        $this->unit_of_work = $unit_of_work;
    }

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
}
