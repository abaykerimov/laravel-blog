<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abay
 * Date: 25.10.2018
 * Time: 22:01
 */

use Illuminate\Support\Facades\Route;

$current_route = 'aisha.dev.kerimov.kz';

Route::group([ 'domain' => $current_route ], function () {

    Route::group([
        'prefix'     => 'admin',
        'middleware' => [ 'auth.admin' ]
    ], function () {
        include_once( __DIR__ . '/admin_routes.php' );
    });

    Route::group([], function(){
        include_once(__DIR__.'/site_routes.php');
    });
});