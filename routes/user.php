<?php

use App\Http\Controllers\user\admin\DashboardController;
use App\Http\Controllers\user\MenuController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'user', 'as' => 'user.'], function () {

    Route::match(['get','post'],'/',[MenuController::class,'index'])->name('index');
    Route::match(['get','post'],'about',[MenuController::class,'about'])->name('about');


    // NEW
    Route::match(['get','post'],'ourLatestBlog',[MenuController::class,'ourLatestBlog'])->name('ourLatestBlog');
    Route::match(['get','post'],'blogDetails/{slug}',[MenuController::class,'blogDetails'])->name('blogDetails');

    Route::match(['get','post'],'blog',[MenuController::class,'blog'])->name('blog');
   Route::match(['get','post'],'/location',[MenuController::class,'location'])->name('location');
   Route::match(['get', 'post'], '/category/{category_url}', [MenuController::class, 'category'])->name('category');
   Route::match(['get','post'],'/contact-us',[MenuController::class,'contact_us'])->name('contact_us');



    Route::match(['get','post'],'/location-search',[MenuController::class,'location_search'])->name('location_search');

    Route::match(['get','post'],'/terms-and-conditions',[MenuController::class,'terms_and_conditions'])->name('terms_and_conditions');
    Route::match(['get','post'],'/refund-policy',[MenuController::class,'refund_policy'])->name('refund_policy');
    Route::match(['get','post'],'/privacy-policy',[MenuController::class,'privacy_policy'])->name('privacy_policy');

    Route::match(['get','post'],'/{country}/{state}/{city}',[MenuController::class,'location_detail'])->name('location_detail');
    Route::match(['get','post'],'/{country}/{state}',[MenuController::class,'location_detail_2']);
    Route::match(['get','post'],'/{country}',[MenuController::class,'location_detail_3']);



});
