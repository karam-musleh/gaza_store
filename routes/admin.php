<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::group(['prefix' => LaravelLocalization::setLocale()], function()
Route::prefix(LaravelLocalization::setLocale())->middleware('auth','is_admin','verified')->group(function(){
    Route::prefix('admin')->name('admin.')->group(function (){
        Route::get('/',[AdminController::class ,'index'])->name('index');
        Route::get('/profile',[AdminController::class ,'profile'])->name('profile');
        Route::put('/profile',[AdminController::class ,'profile_data'])->name('profile_data');
        Route::post('/check-password',[AdminController::class ,'check_password'])->name('check_password');

        Route::resource('categories',CategoryController::class);
        Route::resource('products',ProductController::class);
        Route::get('/delete-image/{id?}' ,[ProductController::class ,'delete_img'])->name('delete_img');
        Route::get('/orders',[AdminController::class , 'orders'])->name('orders');
        Route::get('/notifications',[AdminController::class , 'notifications'])->name('notifications');

});
});
//
