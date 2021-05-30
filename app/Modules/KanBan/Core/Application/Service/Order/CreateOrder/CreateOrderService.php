<?php


namespace App\Modules\KanBan\Core\Application\Service\Order\CreateOrder;


use App\Modules\KanBan\Core\Domain\Model\Order;
use App\Modules\KanBan\Core\Domain\Repository\OrderRepositoryInterface;

class CreateOrderService
{
    private OrderRepositoryInterface $order_repository;

    /**
     * CreateOrderService constructor.
     * @param OrderRepositoryInterface $Order_repository
     */
    public function __construct(OrderRepositoryInterface $order_repository)
    {
        $this->order_repository = $order_repository;
    }

    public function execute(CreateOrderRequest $request)
    {
        $order = Order::create(
            [
                'name' => $request->getName(),
                'total_price' => $request->getTotalPrice(),
                'id_product' => $request->getIdProduct(),
                'qty' => $request->getQty()
            ]
        );
        $this->order_repository->persist($order);
    }
}