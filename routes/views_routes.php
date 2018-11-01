<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abay
 * Date: 25.10.2018
 * Time: 21:56
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'Site',
], function(){
    Route::group([
        'namespace'  => 'Views',
    ], function(){
        Route::get('/', 'PostController@index')->name('posts.index');
        Route::get('/posts/{post}', 'PostController@show')->name('posts.details');

    });
});
