<?php

namespace App\Providers;

use App\Modules\KanBan\Core\Domain\Service\GMailServiceInterface;
use App\Modules\KanBan\Infrastructure\Service\GMailService;
use Illuminate\Support\ServiceProvider;

class GMailServiceProvider extends ServiceProvider
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
        $app = $this->app;
        $app->singleton(GMailServiceInterface::class, GMailService::class);
    }
}
