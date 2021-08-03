<?php

use App\Http\Controllers\EmailTestController;

if (app()->environment('local')) {
    Route::group(['prefix' => 'emails'], function () {
        Route::get('onboarding', [EmailTestController::class, 'onboarding']);
    });
}
