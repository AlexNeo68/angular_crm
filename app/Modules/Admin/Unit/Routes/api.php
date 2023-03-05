<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'units', 'middleware' => []], function () {
    Route::get('/', 'Api\UnitsController@index')->name('api.units.index');
});