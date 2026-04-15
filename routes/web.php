<?php

use App\Enums\User\PermissionEnum;
use App\Enums\User\RoleEnum;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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



Route::any('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::any('test', [TestController::class, 'test']);
