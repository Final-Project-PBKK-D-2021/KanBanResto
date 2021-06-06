<?php

namespace App\Providers;


use App\Modules\KanBan\Core\Application\Service\QRCode\QRCodeService;
use App\Modules\KanBan\Core\Domain\Service\QRCodeServiceInterface;
use Illuminate\Support\ServiceProvider;

class QRCodeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(QRCodeServiceInterface::class, QRCodeService::class);
    }
}
