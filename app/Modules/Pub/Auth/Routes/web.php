<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auths', 'middleware' => []], function () {
    Route::get('/', 'AuthController@index')->name('auths.index');
});
