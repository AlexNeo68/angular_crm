<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'statuses', 'middleware' => []], function () {
    Route::get('/', 'Api\StatusController@index')->name('api.statuses.index');
});