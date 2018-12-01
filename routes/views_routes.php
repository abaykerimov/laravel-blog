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

Route::group([
    'prefix' => 'admin',
    'namespace'  => 'Admin',
], function(){
    Route::get('/',[
        'as'    => 'admin',
        function() {
            if (auth()->check() and auth()->user()->isAdmin()) {
                return view('admin.posts.list');
            }
            return redirect()->route('admin.auth.login');
        }
    ]);
    Route::group([
        'namespace'  => 'Views',
    ], function(){
        Route::get('/posts', 'PostController@index')->name('admin.posts.index');
        Route::get('/posts/{post}', 'PostController@show')->name('admin.posts.details');

        Route::group([
            'prefix'     => 'auth',
        ], function(){
            Route::get('/login', 'AuthController@login')->name('admin.auth.login');
            Route::get('/forgot', 'AuthController@forgot')->name('admin.auth.forgot');
            Route::get('/reset', 'AuthController@reset')->name('admin.auth.reset');
        });
    });
});