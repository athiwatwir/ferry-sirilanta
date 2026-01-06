<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
});

Route::controller(BookingController::class)->group(function () {
    Route::get('booking/flight', 'flight')->name('booking.flight');
    Route::post('booking/passenger', 'passenger')->name('booking.passenger');

    Route::get('booking/payment/{id}', 'payment')->name('booking.payment');

    Route::get('b/{bookingno}', 'view')->name('booking.view');

    //Route::post('bres', 'view')->name('booking.view')->withoutMiddleware([VerifyCsrfToken::class]);
});

Route::resources([
    'booking' => BookingController::class,

]);
