<?php


namespace App\Modules\KanBan\Presentation\Controller;

use App\Modules\KanBan\Core\Application\Service\Order\CreateOrder\CreateOrderRequest;
use App\Modules\KanBan\Core\Application\Service\Order\CreateOrder\CreateOrderService;
use App\Modules\KanBan\Core\Application\Service\Order\DeleteOrder\DeleteOrderRequest;
use App\Modules\KanBan\Core\Application\Service\Order\DeleteOrder\DeleteOrderService;
use App\Modules\KanBan\Core\Application\Service\Order\ListOrder\ListOrderService;
use App\Modules\KanBan\Core\Application\Service\Product\ListProduct\ListProductService;
use App\Modules\KanBan\Core\Domain\Model\Order;
use App\Modules\KanBan\Core\Domain\Model\Outlet;
use App\Modules\KanBan\Core\Domain\Service\QRCodeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class OrderController
{
    public function showCreateOrderForm()
    {
        /** @var ListProductService $service */
        $service = resolve(ListProductService::class);

        $outlet = Outlet::where('id', Auth::guard('staff')->user()->outlet_id)->first();

        $products = $service->execute($outlet->business_id);

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
            Auth::guard('staff')->user()->outlet_id,
            $request->input('qty'),
            $request->input('id_product')
        );

        /** @var CreateOrderService $service */
        $service = resolve(CreateOrderService::class);

        try {
            $order_id = $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Order Creation Failed');
        }
        //dd($order_id);
        return redirect()->route('staff.order.showPayment', ['order_id' => $order_id]);
    }

    public function listOrder(){
        /** @var ListOrderService $service */
        $service = resolve(ListOrderService::class);

        $orders = $service->execute(Auth::guard('staff')->user()->outlet_id);

        return view('KanBan::order.order_list', compact('orders'));
    }

    public function qrcode(int $order_id) {
        /** @var QRCodeServiceInterface $qrService */
        $qrService = resolve(QRCodeServiceInterface::class);

        $qrCode = $qrService->generateOrderQR($order_id);

        return view('KanBan::order.qrcode', compact('qrCode'));
    }

    public function showPayment(int $order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('KanBan::order.payment_form', compact('order'));

    }

    public function cancelOrder (int $order_id){
        //dd($order_id);
        $input = new DeleteOrderRequest(
            $order_id
        );

        /** @var DeleteOrderService $service */
        $service = resolve(DeleteOrderService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Order Delete Failed');
        }
        return redirect()->route('staff.order.create');
    }

    public function updatePriceOrder(Request $request, $order_id)
    {
     //   dd($request->total, $order_id);
        $total_price = $request->total;
        $order = Order::findOrFail($order_id);

        $order->update(['total_price'=> $total_price]);

        return redirect()->route('staff.order.qrcode', ['order_id' => $order_id]);
    }
}
