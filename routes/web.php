<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\BlogCatController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'load_dashboard')->name('dashboard');
        Route::get('admin/logout', 'destroy')->name('admin.logout');
        Route::get('admin/profile', 'profile')->name('admin.profile');
        Route::get('edit/profile', 'edit_profile')->name('edit.profile');
        Route::post('store/profile', 'store_profile')->name('store.profile');
        Route::get('change/password', 'change_password')->name('change.password');
        Route::post('update/password', 'update_password')->name('update.password');
        Route::post('update/multi_imgs', 'update_multi_imgs')->name('update.multi_imgs');
        Route::get('edit/about', 'edit_about')->name('edit.about');
        Route::post('update/about', 'update_about')->name('update.about');
        Route::get('edit/multi_img/{id}', 'edit_multi_img')->name('edit.multi_img');
        Route::post('update/multi_img', 'update_multi_img')->name('update.multi_img');
        Route::get('delete/multi_img/{id}', 'delete_multi_img')->name('delete.multi_img');
        Route::get('view/portfolios', 'all_portfolio')->name('all.portfolio');
        Route::get('add/portfolio', 'add_portfolio')->name('add.portfolio');
        Route::post('new/portfolio', 'new_portfolio')->name('new.portfolio');
        Route::get('edit/portfolio/{id}', 'edit_portfolio')->name('edit.portfolio');
        Route::post('update/portfolio', 'update_portfolio')->name('update.portfolio');
        Route::get('delete/portfolio/{id}', 'delete_portfolio')->name('delete.portfolio');
    });
    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('/home/slider','home_slider')->name('home.slide');
        Route::post('/update/slider','update_slider')->name('update.slider');
    });
    Route::controller(BlogCatController::class)->group(function () {
        Route::get('blog/categories', 'blog_categories')->name('blog.categories');
        Route::post('blog/add/category', 'blog_add_cat')->name('blog.add_cat');
        Route::get('blog/edit/category/{id}', 'blog_edit_cat')->name('blog.edit_cat');
        Route::post('blog/update/category/', 'blog_update_cat')->name('blog.update_cat');
        Route::get('blog/delete/category/{id}', 'blog_delete_cat')->name('blog.delete_cat');
    });
    Route::controller(BlogController::class)->group(function() {
        Route::get('blog/all','blog_all')->name('blog.all');
        Route::post('blog/add','blog_add')->name('blog.add');
        Route::get('blog/edit/{id}','blog_edit')->name('blog.edit');
        Route::post('blog/update','blog_update')->name('blog.update');
        Route::get('blog/delete/{id}','blog_delete')->name('blog.delete');
    });
    Route::controller(FooterController::class)->group(function () {
        Route::get('edit/footer', 'edit_footer')->name('edit.footer');
        Route::post('update/footer', 'update_footer')->name('update.footer');
    });
});

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'load_home')->name('load.home');
    Route::get('about', 'load_about')->name('load.about');
    Route::get('portfolios', 'load_portfolios')->name('load.portfolios');
    Route::get('portfolio/{id}', 'load_portfolio')->name('load.portfolio');
    Route::get('blog', 'load_blogs')->name('load.blogs');
    Route::get('blog/{id}', 'load_blog')->name('load.blog');
    Route::get('contact', 'load_contact')->name('load.contact');
});

Route::controller(ContactController::class)->group(function () {
    Route::post('contact/submit', 'contact_submit')->name('contact.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';