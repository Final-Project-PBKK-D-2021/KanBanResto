<?php


use App\Modules\KanBan\Presentation\Controller\Auth\OwnerAuthController;
use App\Modules\KanBan\Presentation\Controller\Auth\StaffAuthController;
use App\Modules\KanBan\Presentation\Controller\BusinessController;
use App\Modules\KanBan\Presentation\Controller\MenuController;
use App\Modules\KanBan\Presentation\Controller\OrderController;
use App\Modules\KanBan\Presentation\Controller\OutletController;
use App\Modules\KanBan\Presentation\Controller\ProductController;
use App\Modules\KanBan\Presentation\Controller\StaffController;
use App\Modules\KanBan\Presentation\Middleware\OwnerMiddleware;
use App\Modules\KanBan\Presentation\Middleware\StaffMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return view('KanBan::welcome');
    }
)->name('welcome');

Route::get(
    '/dd_session',
    function () {
        dd(Auth::guard('staff')->user(), Auth::guard('owner')->check(), Auth::user(), Auth::guard());
    }
)->name('dd');

Route::get('/owner/login', [OwnerAuthController::class, 'showLoginForm'])->name('login');
Route::post('/owner/login', [OwnerAuthController::class, 'authenticate'])->name('login');
Route::get('/owner/register', [OwnerAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/owner/register', [OwnerAuthController::class, 'register'])->name('register');
Route::post('/owner/logout', [OwnerAuthController::class, 'logout'])->name('logout');
Route::post('/staff/logout', [StaffAuthController::class, 'logout'])->name('staff_logout');


Route::get('/staff/login', [StaffAuthController::class, 'showLoginForm'])->name('staff_login');
Route::post('/staff/login', [StaffAuthController::class, 'authenticate'])->name('staff_login');

Route::prefix('owner')->name('owner.')->middleware(OwnerMiddleware::class)->group(
    function () {
        Route::prefix('business')->name('business.')->group(
            function () {
                Route::get('/', [BusinessController::class, 'showBusinessList'])->name('index');

                Route::get('create', [BusinessController::class, 'showCreateBusinessForm'])->name('create');
                Route::post('create', [BusinessController::class, 'createBusiness'])->name('store');

                Route::get('edit/{business_id}', [BusinessController::class, 'showEditBusiness'])->name('edit');
                Route::post('update', [BusinessController::class, 'updateBusiness'])->name('update');

                Route::post('delete', [BusinessController::class, 'deleteBusiness'])->name('delete');
            }
        );

        Route::prefix('/{business_id}')->name('withBusiness.')->group(
            function () {
                Route::get('/', [BusinessController::class, 'showBusinessDashboard'])->name('dashboard');

                Route::prefix('menu')->name('menu.')->group(
                    function () {
                        Route::get('/', [MenuController::class, 'listMenu'])->name('index');

                        Route::get('create', [MenuController::class, 'showCreateMenuForm'])->name('create');
                        Route::post('create', [MenuController::class, 'createMenu'])->name('store');

                        Route::get('edit/{menu_id}', [MenuController::class, 'showEditMenuForm'])->name('edit');
                        Route::post('edit/{menu_id}', [MenuController::class, 'editMenu'])->name('update');

                        Route::post('delete/{menu_id}', [MenuController::class, 'deleteMenu'])->name('delete');
                    }
                );

                Route::prefix('product')->name('product.')->group(
                    function () {
                        Route::get('/', [ProductController::class, 'listProduct'])->name('index');

                        Route::get('create', [ProductController::class, 'showCreateProductForm'])->name('create');
                        Route::post('create', [ProductController::class, 'createProduct'])->name('store');

                        Route::get('edit/{product_id}', [ProductController::class, 'showEditProductForm'])->name(
                            'edit'
                        );
                        Route::post('edit/{product_id}', [ProductController::class, 'editProduct'])->name('update');

                        Route::post('delete/{product_id}', [ProductController::class, 'deleteProduct'])->name('delete');
                    }
                );

                Route::prefix('outlet')->name('outlet.')->group(
                    function () {
                        Route::get('/', [OutletController::class, 'index'])->name('index');
                        Route::get('/create', [OutletController::class, 'create'])->name('create');
                        Route::get('/{outlet}', [OutletController::class, 'show'])->name('show');

                        Route::post('/', [OutletController::class, 'store'])->name('store');

                        Route::get('/edit/{outlet}', [OutletController::class, 'edit'])->name('edit');
                        Route::patch('/{outlet}', [OutletController::class, 'update'])->name('update');

                        Route::delete('/delete/{outlet}', [OutletController::class, 'destroy'])->name('destroy');
                    }
                );

                Route::prefix('/{outlet_id}')->name('withOutlet.')->group(
                    function () {
                        //Liat penjualan

                        //Staff
                        Route::prefix('staff')->name('staff.')->group(
                            function () {
                                Route::get('/', [StaffController::class, 'listStaff'])->name('index');
                                Route::get('/register', [StaffAuthController::class, 'showRegisterForm'])->name(
                                    'register'
                                );
                                Route::post('/register', [StaffAuthController::class, 'register'])->name('register');
                                Route::post('/delete/{staff_id}', [StaffController::class, 'deleteStaff'])->name(
                                    'delete'
                                );
                            }
                        );
                    }
                );
            }
        );
});

Route::prefix('staff')->name('staff.')->middleware(StaffMiddleware::class)->group(
    function () {
        //Route Untuk Staff ada disini
        Route::prefix('order')->name('order.')->group(
            function () {
                Route::get('/', [OrderController::class, 'listOrder'])->name('index');

                Route::get('create', [OrderController::class, 'showCreateOrderForm'])->name('create');
                Route::post('create', [OrderController::class, 'createOrder'])->name('store');
            }
        );
    }
);
