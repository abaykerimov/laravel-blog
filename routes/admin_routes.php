<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abay
 * Date: 25.10.2018
 * Time: 21:56
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
], function(){
    Route::group([
        'prefix'     => 'auth',
        'namespace'  => 'Auth',
    ], function(){
        Route::post('login', 'AuthController@store');
    });
    Route::group([
        'namespace'  => 'Data',
        'middleware' => ['auth', 'auth.admin'],
    ], function(){
        Route::apiResource('post', 'PostController');
        Route::post('post/upload', 'PostController@upload');
        Route::post('login', 'AuthController@store');
    });
});

