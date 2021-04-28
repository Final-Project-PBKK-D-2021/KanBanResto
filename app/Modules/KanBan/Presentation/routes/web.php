<?php


use App\Modules\KanBan\Presentation\Controller\Login\OwnerLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get(
    '/login',
    function () {
        return view('login');
    }
)->name('login');

Route::post('/login', [OwnerLoginController::class, 'authenticate'])->name('login');
