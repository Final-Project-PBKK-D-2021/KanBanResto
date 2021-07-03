<?php

namespace App\Modules\KanBan\Core\Application\Service\QRCode;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Modules\KanBan\Core\Domain\Model\Order;
use App\Modules\KanBan\Core\Domain\Service\QRCodeServiceInterface;

class QRCodeService implements QRCodeServiceInterface
{
    public function generateMenuQR(string $menu_id)
    {
        return QrCode::size(100)->generate('http://127.0.0.1:8000/detailmenu/'.$menu_id);
    }

    public function generateOrderQR(int $order_id)
    {
        return QrCode::size(100)->generate('http://127.0.0.1:8000/order-details/'.$order_id);
        // $order = Order::findOrFail($order_id);
        // // dd($order);
        // $barcode = '/barcode.png';
        // $file = public_path($barcode);

        // $qrCode = \QRCode::text($order)->setSize(5)->setOutfile($file)->png();

        // return $barcode;
       //return view('KanBan::welcome', compact('barcode'));
    }
}