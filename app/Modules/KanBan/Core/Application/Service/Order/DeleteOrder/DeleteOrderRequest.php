<?php


namespace App\Modules\KanBan\Core\Application\Service\Order\DeleteOrder;


class DeleteOrderRequest
{
    private int $order_id;

    /**
     * DeleteOrderRequest constructor.
     * @param int $Order_id
     */
    public function __construct(int $order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order_id;
    }
}

