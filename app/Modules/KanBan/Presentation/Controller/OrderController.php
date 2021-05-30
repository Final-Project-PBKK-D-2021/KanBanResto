<?php


namespace App\Modules\KanBan\Presentation\Controller;


use App\Modules\KanBan\Core\Application\Service\Order\CreateOrder\CreateOrderRequest;
use App\Modules\KanBan\Core\Application\Service\Order\CreateOrder\CreateOrderService;
use App\Modules\KanBan\Core\Application\Service\Order\ListOrder\ListOrderService;
use App\Modules\KanBan\Core\Application\Service\Product\ListProduct\ListProductService;
use Illuminate\Http\Request;
use Throwable;

class OrderController
{
    public function showCreateOrderForm()
    {
        $service = resolve(ListProductService::class);

        $products =  $service->execute();

        return view('KanBan::order.create_order_form', compact('products'));
    }

    public function createOrder(Request $request)
    {
        
        $request->validate(
            [
                'name' => 'required|max:255'
            ]
        );

        $input = new CreateOrderRequest(
            $request->input('name'),
            $request->input('total_price'),
            $request->input('qty'),
            $request->input('id_product')

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
