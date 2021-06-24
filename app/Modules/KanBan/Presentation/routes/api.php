<?php

use App\Modules\KanBan\Presentation\Controller\API\Auth\OwnerAuthController;
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
    }
);

