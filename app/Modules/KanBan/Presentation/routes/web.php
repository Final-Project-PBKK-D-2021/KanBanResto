<?php


use App\Modules\KanBan\Presentation\Controller\MenuController;
use App\Modules\KanBan\Presentation\Controller\OutletController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return view('base');
    }
)->name('base');


Route::prefix('menu')->name('menu.')->group(function (){
    Route::get('/', [MenuController::class, 'listMenu'])->name('index');

    Route::get('create', [MenuController::class, 'showCreateMenuForm'])->name('create');
    Route::post('create', [MenuController::class, 'createMenu'])->name('store');

    Route::get('edit/{menu_id}', [MenuController::class, 'showEditMenuForm'])->name('edit');
    Route::post('edit/{menu_id}', [MenuController::class, 'editMenu'])->name('update');

    Route::post('delete/{menu_id}', [MenuController::class, 'deleteMenu'])->name('delete');
});

//Outlets
Route::prefix('outlet')->name('outlet.')->group(function (){
    Route::get('/', [OutletController::class, 'index'])->name('index');
    Route::get('/create', [OutletController::class, 'create'])->name('create');
    Route::get('/{outlet}', [OutletController::class, 'show'])->name('show');
    Route::post('/', [OutletController::class, 'store'])->name('store');
    Route::delete('/delete/{outlet}', [OutletController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{outlet}', [OutletController::class, 'edit'])->name('edit');
    Route::patch('/{outlet}', [OutletController::class, 'update'])->name('update');

});


