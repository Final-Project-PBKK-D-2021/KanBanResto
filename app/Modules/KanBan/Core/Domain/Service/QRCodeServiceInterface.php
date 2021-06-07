<?php

namespace App\Modules\KanBan\Core\Domain\Service;

interface QRCodeServiceInterface
{
    public function generateMenuQR(string $menu_id);

    public function generateOrderQR(int $order_id);
}
