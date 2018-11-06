<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.posts.list');
});
Route::get('/posts/{id}', function () {
    return view('site.posts.details');
})->name('posts.details');
Route::get('/admin', function () {
    return view('admin.index');
});
//Route::get('/admin/posts', function () {
//    return view('admin.posts.list');
//})->name('admin.posts.list');


Route::get('test', function () {
    dd(DB::table('migrations')->get());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
