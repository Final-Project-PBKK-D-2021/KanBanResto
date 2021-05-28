<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\StaffRegister;


use App\Modules\KanBan\Core\Domain\Model\Staff;
use App\Modules\KanBan\Core\Domain\Repository\StaffRepositoryInterface;

class StaffRegisterService
{
    private StaffRepositoryInterface $staff_repository;

    /**
     * StaffRegisterService constructor.
     * @param StaffRepositoryInterface $staff_repository
     */
    public function __construct(
        StaffRepositoryInterface $staff_repository
    ) {
        $this->staff_repository = $staff_repository;
    }

    public function execute(StaffRegisterRequest $request)
    {
        $staff = Staff::create(
            [
                'username' => $request->getUsername(),
                'name' => $request->getName(),
                'password' => $request->getPassword(),
                'outlet_id' => $request->getOutletId(),
                'staff_role' => $request->getStaffRole()
            ]
        );

        $this->staff_repository->storeStaff($staff);
    }
}
