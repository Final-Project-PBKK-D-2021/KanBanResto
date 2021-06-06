<?php

namespace App\Modules\KanBan\Core\Domain\Service;

interface QRCodeServiceInterface
{
    public function generateMenuQR(string $menu_id);
}
