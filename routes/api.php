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

Route::get('test', function (){
    return response()->json(['id'=>1,'test'=>'TEST']);
});

Route::group([
    //'prefix'     => 'post',
    //'middleware' => ['api', 'auth:api'],
    //'middleware' => 'api',
    'namespace'  => 'Admin',
], function(){

    Route::apiResource('post', 'AdminPostController')->only(['index', 'store', 'show']);

    Route::apiResource('documents', 'Documents\DocumentsController')->only(['index', 'update'])
        ->parameters([
            'documents' => 'product'
        ]);
    Route::apiResource('documents/tags/{tag}/documents', 'Documents\TagDocumentsRelationController')
        ->only(['index', 'store', 'destroy']);
});