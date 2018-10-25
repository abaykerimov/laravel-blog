<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix'     => 'admin',
    //'middleware' => ['api', 'auth:api'],
    //'middleware' => 'api',
    'namespace'  => 'Admin',
], function(){
    Route::group([
        'prefix'     => 'data',
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
    'prefix'     => 'site',
    //'middleware' => ['api', 'auth:api'],
    //'middleware' => 'api',
    'namespace'  => 'Site',
], function(){
    Route::group([
        'prefix'     => 'data',
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
