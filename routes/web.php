<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Models\RegionDelivery;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function ()  {
    Route::get('/employee/orders/pending', [EmployeeController::class, 'pendingOrders'])->name('employee.orders.pending');
    Route::get('/employee/orders/show/{id}', [EmployeeController::class, 'showOrder'])->name('employee.orders.show');
    Route::post('/employee/orders/{order}/assign-delegate/{delegate}', [EmployeeController::class, 'assignDelegate']);
    Route::post('/employee/orders/reject-order/{orderId}', [EmployeeController::class, 'rejectOrder'])->name('employee.rejectOrder');
    Route::post('/employee/orders/confirm-processing/{orderId}', [EmployeeController::class, 'confirmProcessing'])->name('employee.orders.confirm.processing');
    Route::get('/employee/orders/{orderId}/delegates', [EmployeeController::class, 'getDelegates']);
    Route::post('/employee/orders/regions/activate/{regionId}', [EmployeeController::class, 'activateRegion'])->name('employee.activateRegion');
    Route::post('/employee/orders/store', [EmployeeController::class, 'store'])->name('employee.orders.store');
    Route::get('/employee/orders/create', [EmployeeController::class, 'create'])->name('employee.orders.create');
    // Route::get('{order}/delegates', [OrderController::class, 'getDelegates'])->name('employee.orders.delegates');
    // Route::get('/employee/orders/my-orders', [EmployeeController::class, 'myOrders'])->name('employee.orders.my_orders');

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
