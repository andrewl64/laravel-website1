<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'load_dashboard')->name('dashboard');
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'edit_profile')->name('edit.profile');
        Route::post('/store/profile', 'store_profile')->name('store.profile');
        Route::get('/change/password', 'change_password')->name('change.password');
        Route::post('/update/password', 'update_password')->name('update.password');
        Route::post('/update/multi_imgs', 'update_multi_imgs')->name('update.multi_imgs');
        Route::get('/edit/about', 'edit_about')->name('edit.about');
        Route::post('/update/about', 'update_about')->name('update.about');
        Route::get('/edit/multi_img/{id}', 'edit_multi_img')->name('edit.multi_img');
        Route::post('/update/multi_img', 'update_multi_img')->name('update.multi_img');
        Route::get('/delete/multi_img/{id}', 'delete_multi_img')->name('delete.multi_img');
        Route::get('/view/portfolios', 'all_portfolio')->name('all.portfolio');
        Route::get('/add/portfolio', 'add_portfolio')->name('add.portfolio');
        Route::post('/new/portfolio', 'new_portfolio')->name('new.portfolio');
        Route::get('/edit/portfolio/{id}', 'edit_portfolio')->name('edit.portfolio');
        Route::post('/update/portfolio', 'update_portfolio')->name('update.portfolio');
        Route::get('/delete/portfolio/{id}', 'delete_portfolio')->name('delete.portfolio');
    });
});

Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slider','home_slider')->name('home.slide');
    Route::post('/update/slider','update_slider')->name('update.slider');
});

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'load_home')->name('load.home');
    Route::get('/about', 'load_about')->name('load.about');
    Route::get('/portfolios', 'load_portfolios')->name('load.portfolios');
    Route::get('/portfolio/{id}', 'load_portfolio')->name('load.portfolio');
    Route::get('/blog', 'load_blogs')->name('load.blogs');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';