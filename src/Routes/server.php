<?php

/**
 * Routes which is neccessary for the SSO server.
 */

Route::middleware('api')->prefix('api/sso')->group(function () {
    Route::post('logout', 'AdlyAlimin\LaravelSSO\Controllers\ServerController@logout');
    Route::get('attach', 'AdlyAlimin\LaravelSSO\Controllers\ServerController@attach');
    if(config('laravel-sso.multi_enabled')) {
        Route::get('userInfoMulti', 'AdlyAlimin\LaravelSSO\Controllers\ServerController@userInfoMulti');
        Route::post('loginMulti', 'AdlyAlimin\LaravelSSO\Controllers\ServerController@loginMulti');
    } else {
        Route::post('login', 'AdlyAlimin\LaravelSSO\Controllers\ServerController@login');
        Route::get('userInfo', 'AdlyAlimin\LaravelSSO\Controllers\ServerController@userInfo');
    }

    if(config('laravel-sso.api.enabled')) {
        Route::post('check', 'AdlyAlimin\LaravelSSO\Controllers\ServerController@check');
    }
});
