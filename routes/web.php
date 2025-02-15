<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\RegionDelivery;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('employee/orders')->group(function () {
    Route::get('/pending', [EmployeeController::class, 'pendingOrders'])->name('employee.orders.pending');
    Route::get('/show/{id}', [EmployeeController::class, 'showOrder'])->name('employee.orders.show');
    Route::post('/{order}/assign-delegate/{delegate}', [EmployeeController::class, 'assignDelegate']);
    Route::post('/reject-order/{orderId}', [EmployeeController::class, 'rejectOrder'])->name('employee.rejectOrder');
    Route::post('/confirm-processing/{orderId}', [EmployeeController::class, 'confirmProcessing'])->name('employee.orders.confirm.processing');
    Route::get('/{orderId}/delegates', [EmployeeController::class, 'getDelegates']);
    Route::post('/regions/activate/{regionId}', [EmployeeController::class, 'activateRegion'])->name('employee.activateRegion');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employee.orders.store');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.orders.create');

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
