<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});
// Register & Login Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// Admin Dashboard
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        return view('members.index');
    })->name('members.index');

    Route::get('/create', function () {
    return view('members.create');

    })->name('members.create');
    Route::get('/edit', function () {
        return view('members.edit');
    })->name('members.edit');

Route::get('/members/create-multiple', [MemberController::class, 'createMultiple'])->name('members.createMultiple');
Route::post('/members/store-multiple', [MemberController::class, 'storeMultiple'])->name('members.storeMultiple');
});
Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
});




