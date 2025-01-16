<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'AboutMethod')->name('about.page')->middleware('checkage');
    Route::get('/contact','ContactMethod')->name('contact.page');
});