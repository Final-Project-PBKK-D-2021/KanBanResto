<?php

use App\Modules\KanBan\Presentation\Controller\API\Auth\OwnerAuthController;
use App\Modules\KanBan\Presentation\Controller\API\BusinessController;
use App\Modules\KanBan\Presentation\Controller\API\MenuController;
use App\Modules\KanBan\Presentation\Controller\API\OutletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('owner')->group(
    function () {
        Route::post('login', [OwnerAuthController::class, 'authenticate']);
        Route::post('register', [OwnerAuthController::class, 'register']);
    }
);

Route::middleware('auth:sanctum')->group(
    function () {
        Route::post(
            'get_user',
            function (Request $request) {
                return $request->user();
            }
        );

        Route::prefix('business')->group(
            function () {
                Route::post('create_business', [BusinessController::class, 'createBusiness']);
                Route::post('update_business', [BusinessController::class, 'updateBusiness']);
                Route::post('get_business', [BusinessController::class, 'getBusiness']);
                Route::post('delete_business', [BusinessController::class, 'deleteBusiness']);
                Route::post('list_business', [BusinessController::class, 'listBusiness']);
            }
        );

        Route::prefix('menu')->group(
            function () {
                Route::post('create', [MenuController::class, 'createMenu']);
                Route::post('update', [MenuController::class, 'editMenu']);
                Route::post('get_menu', [MenuController::class, 'getMenu']);
                Route::post('delete', [MenuController::class, 'deleteMenu']);
                Route::post('list', [MenuController::class, 'listMenu']);
            }
        );

        Route::prefix('outlet')->group(
            function () {
                Route::post('create_outlet', [OutletController::class, 'create_outlet']);
                Route::post('update_outlet', [OutletController::class, 'update_outlet']);
                Route::post('get_outlet', [OutletController::class, 'get_outlet']);
                Route::post('delete_outlet', [OutletController::class, 'delete_outlet']);
                Route::post('list_outlet', [OutletController::class, 'list_outlet']);
            }
        );
    }
);
