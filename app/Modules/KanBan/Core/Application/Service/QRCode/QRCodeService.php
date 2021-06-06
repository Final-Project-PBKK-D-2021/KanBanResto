<?php

namespace App\Modules\KanBan\Core\Application\Service\QRCode;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Modules\KanBan\Core\Domain\Service\QRCodeServiceInterface;

class QRCodeService implements QRCodeServiceInterface
{
    public function generateMenuQR(string $menu_id)
    {
        return QrCode::size(100)->generate('http://127.0.0.1:8000/detailmenu/'.$menu_id);
    }
}