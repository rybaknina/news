<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', IndexController::class)
    ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});
