<?php

use Illuminate\Support\Facades\Route;
// use Modules\User\src\Http\Controllers\UserController;

Route::group(['namespace' => 'Modules\Courses\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('courses')->name('courses.')->group(function () {
            Route::get('/', 'CoursesController@index')->name('index');
            Route::get('data', 'CoursesController@data')->name('data');
            Route::get('create/', 'CoursesController@create')->name('create');
            Route::post('create/', 'CoursesController@store');
            Route::get('edit/{user}', 'CoursesController@edit')->name('edit');
            Route::put('edit/{user}', 'CoursesController@update')->name('update');
            Route::delete('delete/{user}', 'CoursesController@delete')->name('delete');
        });
    });
});

Route::group(['prefix' => 'admin/courses/filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
