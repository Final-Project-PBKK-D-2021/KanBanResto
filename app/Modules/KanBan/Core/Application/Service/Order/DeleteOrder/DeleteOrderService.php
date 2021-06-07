<?php


namespace App\Modules\KanBan\Core\Application\Service\Order\DeleteOrder;


use App\Modules\KanBan\Core\Domain\Repository\OrderRepositoryInterface;

class DeleteOrderService
{
    private OrderRepositoryInterface $order_repository;

    /**
     * DeleteOrderService constructor.
     * @param OrderRepositoryInterface $Order_repository
     */
    public function __construct(OrderRepositoryInterface $order_repository)
    {
        $this->order_repository = $order_repository;
    }

    public function execute(DeleteOrderRequest $request)
    {
        $this->order_repository->deleteOrderById($request->getOrderId());
    }
}
