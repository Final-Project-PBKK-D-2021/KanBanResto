<?php

namespace App\Modules\KanBan;

use App\Modules\KanBan\Core\Domain\Repository\OwnerRepositoryInterface;
use App\Modules\KanBan\Infrastructure\Repository\OwnerRepository;
use Illuminate\Contracts\Foundation\Application;

/** @var Application $app */
$app->singleton(OwnerRepositoryInterface::class, OwnerRepository::class);
