<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'tasks', 'middleware' => []], function () {
    Route::get('/', 'Api\TaskController@index')->name('api.tasks.index');
    Route::post('/', 'Api\TaskController@store')->name('api.tasks.store');
    Route::get('/{task}', 'Api\TaskController@show')->name('api.tasks.read');
    Route::put('/{task}', 'Api\TaskController@update')->name('api.tasks.update');
    Route::delete('/{task}', 'Api\TaskController@destroy')->name('api.tasks.delete');

    Route::get('/archive/index', 'Api\TaskController@archive')->name('tasks.archive.index');
});