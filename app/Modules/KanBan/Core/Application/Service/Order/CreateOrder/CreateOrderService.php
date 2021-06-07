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
            ]
        );

        // dd($order->id);
        $order2 = Order::find($order->id);
        $id_product = $request->getIdProduct();
        $qty = $request->getQty();

        //dd($id_product[0], $qty[0]);
        $i=0;
        foreach($qty as $jumlah){
            
            if($jumlah != null || $jumlah != 0){
                //dd("masuk");
                $id = $id_product[$i];
                //dd($id, $jumlah, $order->id);
                $order2->products()->attach($id, ['jumlah' => $jumlah]);
                $order2->products;
                //dd($order2->products);

            }
            $i++;
        }

        // dd($order2->products);
        $this->order_repository->persist($order);
        // dd("masuk");
        return $order->id;
    }
}