<?php


namespace App\Modules\KanBan\Presentation\Controller;


use App\Modules\KanBan\Core\Application\Service\Order\CreateOrder\CreateOrderRequest;
use App\Modules\KanBan\Core\Application\Service\Order\CreateOrder\CreateOrderService;
use App\Modules\KanBan\Core\Application\Service\Order\ListOrder\ListOrderService;
use Illuminate\Http\Request;
use Throwable;

class OrderController
{
    public function showCreateOrderForm()
    {
        return view('KanBan::order.create_order_form');
    }

    public function createOrder(Request $request)
    {
        $request->validate(
            [
                'order_name' => 'required|max:255',
                'order_total_price' => 'required'
            ]
        );

        $input = new CreateOrderRequest(
            $request->input('order_name'),
            $request->input('order_total_price'),

        );

        /** @var CreateOrderService $service */
        $service = resolve(CreateOrderService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Order Creation Failed');
        }
        return redirect()->route('staff.order.index');
    }

    public function listOrder(){
        /** @var ListOrderService $service */
        $service = resolve(ListOrderService::class);

        $orders =  $service->execute();

        return view('KanBan::order.order_list', compact('orders'));
    }

}
