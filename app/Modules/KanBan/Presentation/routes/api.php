<?php

use App\Modules\KanBan\Presentation\Controller\API\Auth\OwnerAuthController;
use App\Modules\KanBan\Presentation\Controller\API\BusinessController;
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
    }
);

