<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Order;

interface OrderRepositoryInterface
{
    // public function getOrderById($id);

    public function persist (Order $order);

    public function listOrderByOutletId($outlet_id);

    // public function deleteOrderById($id);
}
