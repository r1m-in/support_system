<?php

use App\Enums\User\PermissionEnum;
use App\Enums\User\RoleEnum;
use App\Http\Controllers\AppController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);


Route::middleware('auth')->group(function () {

    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::match(['get', 'post'], 'profile', [UserController::class, 'profile'])->name('profile');

    Route::name('app.')->prefix('app')->group(function () {

        Route::get('users', [AppController::class, 'users'])->name('users');
        Route::get('user/{id}', [AppController::class, 'user'])->name('user');
        Route::get('user/{id}/rides', [AppController::class, 'user_rides'])->name('user_rides');

        Route::get('drivers', [AppController::class, 'drivers'])->name('drivers');
        Route::get('driver/{id}', [AppController::class, 'driver'])->name('driver');

        Route::get('vehicles', [AppController::class, 'vehicles'])->name('vehicles');
        Route::get('vehicle/{id}', [AppController::class, 'vehicle'])->name('vehicle');
    });


    Route::match(['get', 'post'], 'users', [UserController::class, 'users'])->name('users')->middleware('can:' . PermissionEnum::USER_VIEW->value);
    Route::name('user.')->prefix('user')->middleware('can:' . PermissionEnum::USER_VIEW->value)->group(function () {
        // Roles
        Route::middleware('role:' . RoleEnum::ADMIN->value)->group(function () {
            Route::get('roles', [UserController::class, 'roles'])->name('roles');
            Route::match(['get', 'post'], 'role/{id}', [UserController::class, 'role'])->name('role');
        });
        // User
        Route::match(['get', 'post'], '/{id}', [UserController::class, 'user'])->name('view')->middleware('can:' . PermissionEnum::USER_VIEW->value);
        Route::match(['get', 'post'], '{id}/edit', [UserController::class, 'edit'])->name('edit')->middleware('can:' . PermissionEnum::USER_EDIT->value);
        Route::match(['get', 'post'], '{id}/password', [UserController::class, 'password'])->name('password')->middleware('can:' . PermissionEnum::USER_EDIT->value);
        Route::match(['get', 'post'], '{id}/role', [UserController::class, 'update_role'])->name('update_role')->middleware('can:' . PermissionEnum::USER_EDIT->value);
        Route::match(['get', 'post'], '{id}/status', [UserController::class, 'status'])->name('status')->middleware('can:' . PermissionEnum::USER_EDIT->value);
    });
});

Route::any('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::any('test', [TestController::class, 'test']);
