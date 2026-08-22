<?php

use App\Enums\User\PermissionEnum;
use App\Enums\User\RoleEnum;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::match(['get', 'post'], 'profile', [UserController::class, 'profile'])->name('profile');

    Route::name('ticket.')->prefix('ticket')->group(function () {
        Route::post('create', [TicketController::class, 'create'])->name('create');
        Route::get('index', [TicketController::class, 'index'])->middleware('can:' . PermissionEnum::TICKETS->value)->name('index');
        Route::match(['get', 'post'], '{id}', [TicketController::class, 'view'])->name('view');
    });

    Route::any('access_requested', [AccessController::class, 'access_requested'])->name('access_requested');

    Route::name('app.')->prefix('app')->group(function () {

        Route::middleware('can:' . PermissionEnum::APP_USER_VIEW->value)->group(function () {
            Route::get('users', [AppController::class, 'users'])->name('users');
            Route::get('user/{id}', [AppController::class, 'user'])->name('user');
            Route::get('user/{id}/rides', [AppController::class, 'user_rides'])->middleware('can:' . PermissionEnum::APP_USER_RIDES->value)->name('user_rides');
            Route::get('user/{id}/tickets', [AppController::class, 'user_tickets'])->middleware('can:' . PermissionEnum::APP_USER_TICKETS->value)->name('user_tickets');
        });

        Route::middleware('can:' . PermissionEnum::APP_DRIVER_VIEW->value)->group(function () {
            Route::get('drivers', [AppController::class, 'drivers'])->name('drivers');
            Route::get('driver/{id}', [AppController::class, 'driver'])->name('driver');
            Route::get('driver/{id}/rides', [AppController::class, 'driver_rides'])->middleware('can:' . PermissionEnum::APP_DRIVER_RIDES->value)->name('driver_rides');
            Route::get('driver/{id}/transactions', [AppController::class, 'driver_transactions'])->middleware('can:' . PermissionEnum::APP_DRIVER_TRANSACTIONS->value)->name('driver_transactions');
            Route::get('driver/{id}/cashback', [AppController::class, 'driver_cashback'])->middleware('can:' . PermissionEnum::APP_DRIVER_CASHBACK->value)->name('driver_cashback');
            Route::get('driver/{id}/tickets', [AppController::class, 'driver_tickets'])->middleware('can:' . PermissionEnum::APP_DRIVER_TICKETS->value)->name('driver_tickets');
        });

        Route::middleware('can:' . PermissionEnum::APP_CASHBACK_VIEW->value)->group(function () {
            Route::get('cashback', [AppController::class, 'cashback'])->name('cashback');
            Route::get('cashback/{id}', [AppController::class, 'cashback_view'])->name('cashback_view');
        });

        Route::middleware('can:' . PermissionEnum::APP_OWNER_VIEW->value)->group(function () {
            Route::get('owners', [AppController::class, 'owners'])->name('owners');
        });

        Route::middleware('can:' . PermissionEnum::APP_VEHICLE_VIEW->value)->group(function () {
            Route::get('vehicles', [AppController::class, 'vehicles'])->name('vehicles');
            Route::get('vehicle/{id}', [AppController::class, 'vehicle'])->name('vehicle');
        });
    });


    Route::name('api.')->prefix('api')->group(function () {
        Route::get('cities', [ApiController::class, 'cities'])->name('cities');
    });

    Route::middleware('role:' . RoleEnum::ADMIN->value)->group(function () {

        Route::any('requested_access', [AccessController::class, 'requested_access'])->name('requested_access');

        Route::match(['get', 'post'], 'reasons', [TicketController::class, 'reasons'])->name('reasons');
        Route::match(['get', 'post'], 'users', [UserController::class, 'users'])->name('users');
        Route::name('user.')->prefix('user')->group(function () {

            // Roles 
            Route::get('roles', [UserController::class, 'roles'])->name('roles');
            Route::match(['get', 'post'], 'role/{id}', [UserController::class, 'role'])->name('role');

            // User
            Route::match(['get', 'post'], '/{id}', [UserController::class, 'user'])->name('view');
            Route::match(['get', 'post'], '{id}/edit', [UserController::class, 'edit'])->name('edit');
            Route::match(['get', 'post'], '{id}/password', [UserController::class, 'password'])->name('password');
            Route::match(['get', 'post'], '{id}/role', [UserController::class, 'update_role'])->name('update_role');
            Route::match(['get', 'post'], '{id}/status', [UserController::class, 'status'])->name('status');
        });
    });
});

Route::any('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::any('test', [TestController::class, 'test']);
