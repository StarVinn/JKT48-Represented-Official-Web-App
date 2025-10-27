<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JKT48Controller;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsScraperController;
use App\Http\Controllers\SetlistController;


use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\ImageCacheMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('user.dashboard');
    }
    return view('welcome');
});

Route::get('/explore', [JKT48Controller::class,'index'])->name('explore');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Register & Login Routes
Route::group(['middleware' => ['guest', ImageCacheMiddleware::class]], function(){
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// User Dashboard
Route::middleware(['auth', ImageCacheMiddleware::class])->group(function () {
    Route::get('/user/dashboard',[NewsScraperController::class, 'view'])->name('user.dashboard');
    // web.php
    Route::get('/partials/members', [MemberController::class, 'getMembers'])->name('partials.members');

    Route::get('/partials/setlist', [SetlistController::class, 'getSetlist'])->name('partials.setlists');

    Route::get('/partials/theater', function () {
        return view('partials.theater');
    });
    Route::get('/partials/lives', [LiveController::class, 'showroom'])->name('partials.live');
    Route::get('/user/detailmembers', [MemberController::class, 'detailmembers'])->name('user.detailmembers');
    Route::get('/user/detailmembers/{id}', [MemberController::class, 'detailmember'])->name('user.detailmember');
    Route::get('/user/setlists', [SetlistController::class, 'index'])->name('user.setlists');
    Route::get('/user/setlists/{id}', [SetlistController::class, 'show'])->name('user.setlists.show');

    // User Profile routes
    Route::get('/user/profile', [\App\Http\Controllers\UserProfileController::class, 'showProfile'])->name('user.profile');
    Route::post('/user/profile', [\App\Http\Controllers\UserProfileController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/user/profile/show', [\App\Http\Controllers\UserProfileController::class, 'showProfileDetail'])->name('user.profile.show');
});

// Admin Dashboard
Route::middleware([AdminMiddleware::class, ImageCacheMiddleware::class])->group(function () {
    Route::get('/members/create-multiple', [MemberController::class, 'createMultiple'])->name('members.createMultiple');
    Route::post('/members/store-multiple', [MemberController::class, 'storeMultiple'])->name('members.storeMultiple');
    Route::get('/members/download', [MemberController::class, 'export'])->name('members.export');

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/admin/news', [NewsScraperController::class, 'index'])->name('admin.news');

    Route::get('/admin/members', function(){
        return view ('admin.members');
    })->name('admin.members');

    Route::get('/admin/setlist', function () {
        return view('admin.setlist');
    })->name('admin.setlist');

    Route::get('/admin/songs/{id}', function ($id) {
        $setlist = \App\Models\Setlist::find($id);
        $setlistTitle = $setlist ? $setlist->title : 'Unknown Setlist';
        return view('admin.songs', ['setlistId' => $id, 'setlistTitle' => $setlistTitle]);
    })->name('admin.songs');

});
Route::middleware([RedirectIfAuthenticated::class, ImageCacheMiddleware::class])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
});




