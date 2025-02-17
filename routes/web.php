<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderDeliveryController;

//rote delivery

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/my-orders', [OrderDeliveryController::class, 'myOrders'])->name('orders.myOrders');
    Route::get('/orders/{id}/view', [OrderDeliveryController::class, 'viewOrder'])->name('orders.view');
    Route::post('/orders/{id}/update-status', [OrderDeliveryController::class, 'updateStatus'])->name('orders.updateStatus');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
