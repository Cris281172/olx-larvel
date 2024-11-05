<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\OfferController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\TypeController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\WatchlistController;

use App\Http\Controllers\FormController;

use App\Http\Controllers\NotificationController;

use App\Http\Controllers\HelloWorldJobController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [FormController::class, 'index'])->name('form_view');
Route::post('/form', [FormController::class, 'store'])->name('form');
Route::get('/hello-world-job', [HelloWorldJobController::class, 'index']);

Route::group(['middleware' => 'guest', 'prefix' => 'auth'], function (){
    Route::get('/register', [AuthController::class, 'register_view'])->name('register_view');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'login_view'])->name('login_view');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function (){

    Route::group(['prefix' => 'offer'], function (){

       Route::get('/create', [OfferController::class, 'offer_create_view'])->name('offer_create_view');
       Route::post('/create', [OfferController::class, 'offer_create'])->name('offer_create');
       Route::get('/delete/{id}', [OfferController::class, 'offer_delete'])->name('offer_delete');
       Route::get('/edit/{id}', [OfferController::class, 'offer_edit_view'])->name('offer_edit_view');
       Route::post('/edit/{id}', [OfferController::class, 'offer_edit'])->name('offer_edit');

    });

    Route::group(['prefix' => 'category'], function (){

        Route::get('/create', [CategoryController::class, 'category_create_view'])->name('category_create_view');
        Route::post('/create', [CategoryController::class, 'category_create'])->name('category_create');
        Route::get('/get/all', [CategoryController::class, 'category_get_all'])->name('category_get_all');
        Route::get('/delete/{id}', [CategoryController::class, 'category_delete'])->name('category_delete');
        Route::get('/edit/{id}', [CategoryController::class, 'category_edit_view'])->name('category_edit_view');
        Route::post('/edit/{id}', [CategoryController::class, 'category_edit'])->name('category_edit');

    });

    Route::group(['prefix' => 'type'], function (){

        Route::get('/create', [TypeController::class, 'type_create_view'])->name('type_create_view');
        Route::post('/create', [TypeController::class, 'type_create'])->name('type_create');
        Route::get('/get/all', [TypeController::class, 'type_get_all'])->name('type_get_all');
        Route::get('/delete/{id}', [TypeController::class, 'type_delete'])->name('type_delete');
        Route::get('/edit/{id}', [TypeController::class, 'type_edit_view'])->name('type_edit_view');
        Route::post('/edit/{id}', [TypeController::class, 'type_edit'])->name('type_edit');

    });

    Route::group(['prefix' => 'user'], function (){
        Route::get('/', [UserController::class, 'index'])->name('user_view');
        Route::get('/logout', [UserController::class, 'logout'])->name('user_logout');
        Route::get('/notifications', [NotificationController::class, 'notifications_view'])->name('notifications_view');
        Route::get('/notification/read/all', [NotificationController::class, 'notifications_read_all'])->name('notifications_read_all');
        Route::get('/notification/read/{id}', [NotificationController::class, 'notification_read'])->name('notification_read');
        Route::get('/change-password', [UserController::class, 'change_password_view'])->name('change_password_view');
        Route::post('/change-password', [UserController::class, 'change_password'])->name('change_password');

        Route::group(['prefix' => 'details'], function (){

            Route::get('/create', [UserController::class, 'details_create_view'])->name('details_create_view');
            Route::post('/create', [UserController::class, 'details_create'])->name('details_create');
            Route::get('/get', [UserController::class, 'details_get_view'])->name('details_get_view');

        });

    });

    Route::group(['prefix' => 'watchlist'], function (){

        Route::get('/create/{offer_id}', [WatchlistController::class, 'watchlist_toggle'])->name('watchlist_toggle');

    });

});

Route::group(['prefix' => 'offer'], function (){

    Route::get('/get/all', [OfferController::class, 'offer_get_all'])->name('offer_get_all');
    Route::get('/get/{id}', [OfferController::class, 'offer_get'])->name('offer_get');

});

