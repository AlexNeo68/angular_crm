<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auths', 'middleware' => []], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('auths.login');
    Route::post('/login', 'LoginController@login')->name('auths.login_post');
});
