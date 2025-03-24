<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('members.index');
});
Route::get('/create', function () {
    return view('members.create');
})->name('members.create');
Route::get('/edit', function () {
    return view('members.edit');
})->name('members.edit');

Route::get('/members/create-multiple', [MemberController::class, 'createMultiple'])->name('members.createMultiple');
Route::post('/members/store-multiple', [MemberController::class, 'storeMultiple'])->name('members.storeMultiple');


