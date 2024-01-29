<?php

use Illuminate\Support\Facades\Route;
// use Modules\User\src\Http\Controllers\UserController;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers'], function () {
    Route::prefix('user')->group(function () {
        Route::get('/', 'UserController@index');
        Route::get('detail/{id}', 'UserController@detail');
        Route::get('create/', 'UserController@create');
    });
});
