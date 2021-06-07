<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Order;
use App\Modules\KanBan\Core\Domain\Repository\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    public function getOrderById($id)
    {
        return Order::where('id', $id)->first();
    }

    public function persist(Order $order)
    {
        $order->save();
    }

    public function listOrder()
    {
        return Order::paginate(10);
    }

    public function deleteOrderById($id)
    {
        Order::where('id', $id)->delete();
    }
}
