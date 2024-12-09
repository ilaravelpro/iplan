<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/17/20, 5:52 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

Route::namespace('v1')->prefix('v1')->group(function() {
    Route::group(['middleware' => ['authIf:api']], function () {
        if (iplan('routes.api.status')) {
            Route::apiResource('plans', 'PlanController', ['as' => 'api']);
            Route::apiResource('plan_users', 'PlanUserController', ['as' => 'api']);
        }
    });
});
