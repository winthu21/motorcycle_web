<?php

use App\Http\Controllers\Guest\GuestController;

Route::group(['prefix'=>'guest'],function(){
    Route::get('home', [GuestController::class,'home'])->name('home');
});
