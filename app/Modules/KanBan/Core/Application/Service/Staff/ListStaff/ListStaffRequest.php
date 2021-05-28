<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\ListStaff;


class ListStaffRequest
{
    private int $business_id;
    private int $outlet_id;

    /**
     * ListStaffRequest constructor.
     * @param int $business_id
     * @param int $outlet_id
     */
    public function __construct(int $business_id, int $outlet_id)
    {
        $this->business_id = $business_id;
        $this->outlet_id = $outlet_id;
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
}
