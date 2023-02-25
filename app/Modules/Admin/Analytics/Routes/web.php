<?php

use App\Modules\Admin\Analytics\Controllers\AnalyticsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'analytics', 'middleware' => []], function () {
    Route::get('/export/{user}/{dateStart}/{dateEnd}', [AnalyticsController::class, 'export'])->name('analytics.export');
});