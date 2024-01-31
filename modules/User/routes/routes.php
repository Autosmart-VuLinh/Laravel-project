<?php

use Illuminate\Support\Facades\Route;
// use Modules\User\src\Http\Controllers\UserController;

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\User\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('admin.users.index');
        Route::get('data', 'UserController@data')->name('admin.users.data');
        Route::get('create/', 'UserController@create')->name('admin.users.create');
        Route::post('create/', 'UserController@store');
        Route::get('edit/{user}', 'UserController@edit')->name('admin.users.edit');
        Route::post('edit/{user}', 'UserController@update')->name('admin.users.update');
        Route::post('delete/{user}', 'UserController@delete')->name('admin.users.delete');
    });
});
