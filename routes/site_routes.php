<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abay
 * Date: 25.10.2018
 * Time: 21:56
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'namespace'  => 'Site',
], function(){
    Route::group([
        'namespace'  => 'Data',
    ], function(){
        Route::group([
            'prefix'  => 'post',
        ], function(){
            Route::get('{post}/comments', 'CommentController@show');
            Route::post('{post}/comments', 'CommentController@store');
        });
        Route::apiResource('post', 'PostController')->only(['index', 'show']);

        Route::apiResource('documents', 'Documents\DocumentsController')->only(['index', 'update'])
            ->parameters([
                'documents' => 'product'
            ]);
        Route::apiResource('documents/tags/{tag}/documents', 'Documents\TagDocumentsRelationController')
            ->only(['index', 'store', 'destroy']);
    });
});