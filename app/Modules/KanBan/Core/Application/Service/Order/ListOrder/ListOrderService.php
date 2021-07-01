<?php


namespace App\Modules\KanBan\Core\Application\Service\Order\ListOrder;


use App\Modules\KanBan\Core\Domain\Repository\OrderRepositoryInterface;

class ListOrderService
{
    private OrderRepositoryInterface $order_repository;

    /**
     * GetAllOrderService constructor.
     * @param OrderRepositoryInterface $Order_repository
     */
    public function __construct(OrderRepositoryInterface $order_repository)
    {
        $this->order_repository = $order_repository;
    }

    public function execute($outlet_id)
    {
        $orders = $this->order_repository->listOrderByOutletId($outlet_id);
        return $orders;
    }
}
