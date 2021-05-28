<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\DeleteStaff;


class DeleteStaffRequest
{
    private int $business_id;
    private int $outlet_id;
    private int $staff_id;

    /**
     * DeleteStaffRequest constructor.
     * @param int $business_id
     * @param int $outlet_id
     * @param int $staff_id
     */
    public function __construct(int $business_id, int $outlet_id, int $staff_id)
    {
        $this->business_id = $business_id;
        $this->outlet_id = $outlet_id;
        $this->staff_id = $staff_id;
    }

    /**
     * @return int
     */
    public function getBusinessId(): int
    {
        return $this->business_id;
    }

    /**
     * @return int
     */
    public function getOutletId(): int
    {
        return $this->outlet_id;
    }

    /**
     * @return int
     */
    public function getStaffId(): int
    {
        return $this->staff_id;
    }
}
