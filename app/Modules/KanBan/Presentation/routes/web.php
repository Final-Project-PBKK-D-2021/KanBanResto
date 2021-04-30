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

Route::get(
    '/',
    function () {
        return view('base');
    }
)->name('base');

Route::post('/login', [OwnerLoginController::class, 'authenticate'])->name('login');
