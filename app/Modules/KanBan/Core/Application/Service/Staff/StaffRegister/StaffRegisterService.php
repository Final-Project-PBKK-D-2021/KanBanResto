<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\StaffRegister;


use App\Modules\KanBan\Core\Domain\Model\Staff;
use App\Modules\KanBan\Core\Domain\Repository\StaffRepositoryInterface;
use App\Modules\KanBan\Core\Domain\Service\MailtrapServiceInterface;

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
                'email' => $request->getEmail(),
                'name' => $request->getName(),
                'password' => $request->getPassword(),
                'staff_role' => $request->getStaffRole(),
                'outlet_id' => $request->getOutletId()
            ]
        );

        /** @var MailtrapServiceInterface $service */
        $service = resolve(MailtrapServiceInterface::class);

        $service->sendStaffWelcomeEmail($staff);
 
        $this->staff_repository->storeStaff($staff);
    }
}
