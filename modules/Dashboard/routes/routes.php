<?php

use Illuminate\Support\Facades\Route;
// use Modules\User\src\Http\Controllers\UserController;

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Dashboard\src\Http\Controllers'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
});
