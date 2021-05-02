<?php

namespace App\Modules\KanBan;

use App\Modules\KanBan\Core\Domain\Repository\MenuRepositoryInterface;
use App\Modules\KanBan\Core\Domain\Repository\ProductRepositoryInterface;
use App\Modules\KanBan\Core\Domain\Repository\OwnerRepositoryInterface;
use App\Modules\KanBan\Infrastructure\Repository\MenuRepository;
use App\Modules\KanBan\Infrastructure\Repository\OwnerRepository;
use App\Modules\KanBan\Infrastructure\Repository\ProductRepository;
use Illuminate\Contracts\Foundation\Application;

/** @var Application $app */
$app->singleton(OwnerRepositoryInterface::class, OwnerRepository::class);
$app->singleton(MenuRepositoryInterface::class, MenuRepository::class);
$app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
