<?php

use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Auth\EditUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Middleware\RegisterLoginMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware([RegisterLoginMiddleware::class])->group(function () {
    Route::get('sign-in', [RegisterController::class, 'showRegisterForm'])->name('signin');
    Route::post('sign-in', [RegisterController::class, 'register'])->name('signin.store');

    Route::post('check-email', [RegisterController::class, 'checkEmail'])->name('check-email');

    Route::get('sign-up', [LoginController::class, 'showLoginForm'])->name('signup');
    Route::post('sign-up', [LoginController::class, 'login'])->name('signup.store');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('toloo')->group(function () {
    Route::get('/', [HomeController::class, 'bestTours'])->name('home');

    Route::get('/about-us', function () {
        return view('home.about.about-us');
    })->name('about-us');

    Route::get('/foreign-tours', [HomeController::class, 'foreignTours'])->name('foreign-tours');

    Route::get('/tourism-in-Iran', [HomeController::class, 'iranInTours'])->name('tourism-in-Iran');

    Route::get('/edit-profile', [EditUserController::class, 'showEditFormUser'])->name('profile.edit');
    Route::post('/edit-profile', [EditUserController::class, 'updateProfile'])->name('profile.update');


    Route::middleware(['auth'])->group(function () {
        Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
        Route::post('/cart/add/{slug}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    });


    Route::get('/land-tours', [HomeController::class, 'landTours'])->name('land-tours');

    Route::get('/tours-page/{slug}', [HomeController::class, 'indexPageTours'])->name('tours-page');
    Route::post('/tours-page/{slug}/reserve', [HomeController::class, 'reserveTour'])->name('reserve-tour');

    // Controller admin panel
    Route::prefix('admin')->group(function () {
        //افزودن تور جدید
        Route::get('/create-tour', [AdminPanelController::class, 'index'])->name('admin-panel');
        Route::post('/created', [AdminPanelController::class, 'store'])->name('admin-panel.store');


        Route::get('master-controller', [AdminPanelController::class, 'adminMaster'])->name('master-controller');
        Route::delete('/admin-master-destroy/{id}', [AdminPanelController::class, 'adminMasterDestroy'])->name('adminMasterDestroy');

        Route::get('/fetch-users', [AdminPanelController::class, 'fetchUsers'])->name('fetchUsers');
        Route::post('/make-admin', [AdminPanelController::class, 'makeAdmin'])->name('makeAdmin');


        // مدیریت ویرایش و حذف تورها
        Route::get('tours', [AdminPanelController::class, 'controlsTours'])->name('master-controls-tors');
        Route::delete('tours/{id}', [AdminPanelController::class, 'deleteTour'])->name('tours.delete');
        Route::get('tours/{id}/edit', [AdminPanelController::class, 'editTour'])->name('admin.editTour');
        Route::put('tours/{id}', [AdminPanelController::class, 'updateTour'])->name('tours.update');
        Route::get('tours/{id}', [AdminPanelController::class, 'fetchTour'])->name('tours.fetch');


//        Route::get('/master-controls-tors', [AdminPanelController::class, 'controlsTours'])->name('master-controls-tors');
//        Route::delete('tours-destroy/{id}', [AdminPanelController::class, 'deleteTour'])->name('tours.delete');
//        Route::put('tours-update/{id}', [AdminPanelController::class, 'updateTour'])->name('tours.update');
//        Route::get('tours/{id}', [AdminPanelController::class, 'fetchTour'])->name('tours.fetch');


        Route::get('/reservation-tors', function () {
            return view('Admin.reservation-tors');
        })->name('reservation-tors');
    });
});




