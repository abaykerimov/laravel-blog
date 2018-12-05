<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abay
 * Date: 25.10.2018
 * Time: 21:58
 */

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    dd(request()->ip());
    dd(Hash::make('aishaisha'));
});