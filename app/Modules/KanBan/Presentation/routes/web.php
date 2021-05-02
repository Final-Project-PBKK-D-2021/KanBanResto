<?php


use App\Modules\KanBan\Presentation\Controller\MenuController;
use App\Modules\KanBan\Presentation\Controller\ProductController;
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

Route::prefix('product')->name('product.')->group(function (){
    Route::get('/', [ProductController::class, 'listProduct'])->name('index');

    Route::get('create', [ProductController::class, 'showCreateProductForm'])->name('create');
    Route::post('create', [ProductController::class, 'createProduct'])->name('store');
    
    Route::get('edit/{product_id}', [ProductController::class, 'showEditProductForm'])->name('edit');
    Route::post('edit/{product_id}', [ProductController::class, 'editProduct'])->name('update');

    Route::post('delete/{product_id}', [ProductController::class, 'deleteProduct'])->name('delete');
});
