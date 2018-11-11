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
    //'middleware' => ['api', 'auth:api'],
    'middleware' => 'api',
    'namespace'  => 'Admin',
], function(){
    Route::group([
        'namespace'  => 'Data',
    ], function(){
        Route::apiResource('post', 'PostController');
        Route::post('post/upload', 'PostController@upload');
    });
});

Route::group([
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
], function(){
    Route::group([
        'namespace'  => 'Views',
    ], function(){
        Route::resource('posts', 'PostController');
    });
});
