<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\KanBan\Core\Domain\Service\MailtrapServiceInterface;
use App\Modules\KanBan\Infrastructure\Service\MailtrapService;

class MailServiceProvider extends ServiceProvider
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
        $app->singleton(MailtrapServiceInterface::class, MailtrapService::class);
    }
}
