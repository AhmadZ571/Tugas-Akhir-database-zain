<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hotel', [HomeController::class, 'hotel'])->name('hotel');
Route::get('/hotel/{id}', [HomeController::class, 'viewHotel'])->name('view.hotel');

Route::middleware('auth')->group(function () {
    Route::get('/transaction/{id}', [TransactionController::class, 'transaction'])->name('transaction');
    Route::post('/transaction/s', [TransactionController::class, 'storeTransaction'])->name('store.transaction');
    Route::get('/order/{id}', [TransactionController::class, 'order'])->name('order');
});

Route::middleware('admin')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/hotel', [AdminController::class, 'indexHotel'])->name('admin.hotel');
        Route::get('/hotel/c', [AdminController::class, 'createHotel'])->name('admin.hotel.create');
        Route::get('/hotel/e/{id}', [AdminController::class, 'editHotel'])->name('admin.hotel.edit');

        Route::get('/room', [AdminController::class, 'indexRoom'])->name('admin.room');
        Route::get('/room/c', [AdminController::class, 'createRoom'])->name('admin.room.create');
        Route::get('/room/e/{id}', [AdminController::class, 'editRoom'])->name('admin.room.edit');

        Route::get('/transaction', [TransactionController::class, 'index'])->name('admin.transaction');

        Route::post('hotel/s', [AdminController::class, 'storeHotel'])->name('admin.hotel.store');
        Route::post('/hotel/u/{id}', [AdminController::class, 'updateHotel'])->name('admin.hotel.update');
        Route::post('/room/s', [AdminController::class, 'storeRoom'])->name('admin.room.store');
        Route::post('/room/u/{id}', [AdminController::class, 'updateRoom'])->name('admin.room.update');

        Route::post('/hotel/d/{id}', [AdminController::class, 'deleteHotel'])->name('admin.hotel.delete');
        Route::post('/room/d/{id}', [AdminController::class, 'deleteRoom'])->name('admin.room.delete');
    });
});
