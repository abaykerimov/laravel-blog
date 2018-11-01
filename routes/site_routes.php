<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abay
 * Date: 25.10.2018
 * Time: 21:56
 */

use Illuminate\Support\Facades\Route;

Route::group([
    //'prefix'     => 'site',
    //'middleware' => ['api', 'auth:api'],
    //'middleware' => 'api',
    'namespace'  => 'Site',
], function(){
    Route::group([
        //'prefix'     => 'data',
        'namespace'  => 'Data',
    ], function(){
        Route::apiResource('post', 'PostController')->only(['index', 'store', 'show']);

        Route::apiResource('documents', 'Documents\DocumentsController')->only(['index', 'update'])
            ->parameters([
                'documents' => 'product'
            ]);
        Route::apiResource('documents/tags/{tag}/documents', 'Documents\TagDocumentsRelationController')
            ->only(['index', 'store', 'destroy']);
    });
});

Route::group([
    //'prefix'     => 'site',
    //'middleware' => ['api', 'auth:api'],
    //'middleware' => 'api',
    'namespace'  => 'Site',
], function(){
    Route::group([
        'prefix'     => 'views',
        'namespace'  => 'views',
    ], function(){
        Route::apiResource('post', 'PostController')->only(['index', 'store', 'show']);

        Route::apiResource('documents', 'Documents\DocumentsController')->only(['index', 'update'])
            ->parameters([
                'documents' => 'product'
            ]);
        Route::apiResource('documents/tags/{tag}/documents', 'Documents\TagDocumentsRelationController')
            ->only(['index', 'store', 'destroy']);
    });
});
