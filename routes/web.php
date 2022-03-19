<?php

use App\Http\Controllers\CultureController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsUserController;
use App\Http\Controllers\SkladController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/access-denied', function () {
    return view('accessDenied');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/cabinet', [HomeController::class, 'index'])->name('cabinet');
    Route::get('/sklads', [SkladController::class, 'index'])->name('sklads');
    Route::get('/notifications', NotificationsController::class)->name('notifications');

    Route::resource('/settings', SettingsUserController::class);

    Route::resource('/place', PlaceController::class);
    Route::resource('/culture', CultureController::class);
});
