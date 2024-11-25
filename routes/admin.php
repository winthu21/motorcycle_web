<?php

use App\Http\Controllers\Admin\BikeBrandController;
use App\Http\Controllers\Admin\BikeDetailsController;
use App\Http\Controllers\Admin\BikeCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::group(['prefix'=>'admin'],function(){
    Route::get('/home',[ AdminDashboardController::class,'index'])->name('adminDashboard');

    // Bike Brand
    Route::group(['prefix'=>'brand'],function(){
        Route::get('brandCreatePage',[BikeBrandController::class,'brandCreatePage'])->name('brandCreatePage');
        Route::post('brandCreate',[BikeBrandController::class,'brandCreate'])->name('brandCreate');
        Route::get('brandList',[BikeBrandController::class,'brandList'])->name('brandList');
        Route::get('brandEditPage/{id}',[BikeBrandController::class,'brandEditPage'])->name('brandEditPage');
        Route::post('brandEdit',[BikeBrandController::class,'brandEdit'])->name('brandEdit');
        Route::get('brandDelete/{id}',[BikeBrandController::class,'brandDelete'])->name('brandDelete');
    });

    // Bike Category
    Route::get('categoryListPage',[ BikeCategoryController::class,'categoryListPage'])->name('categoryListPage');
    Route::get('categoryCreatePage',[ BikeCategoryController::class,'categoryCreatePage'])->name('categoryCreatePage');
    Route::post('categoryCreate',[ BikeCategoryController::class,'categoryCreate'])->name('categoryCreate');
    Route::get('categoryUpdatePage/{id}',[ BikeCategoryController::class,'categoryUpdatePage'])->name('categoryUpdatePage');
    Route::post('categoryUpdate',[ BikeCategoryController::class,'categoryUpdate'])->name('categoryUpdate');
    Route::get('categoryDelete/{id}',[ BikeCategoryController::class,'categoryDelete'])->name('categoryDelete');

    // bike
    Route::get('bikeDetailsCreatePage',[ BikeDetailsController::class,'bikeDetailsCreatePage'])->name('bikeDetailsCreatePage');
});
