<?php

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

//Route::get('/', function () {    return view('welcome'); });
Route::get('/', function () {    return redirect('home'); });

Route::get('/allcategories', 'CategoryController@showall')->name('all-categories');
Route::get('allproducts', 'ProductController@index')->name('all-products');

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('albums', 'AlbumController');
Route::resource('photos', 'PhotoController');

Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth', 'prefix' => 'post'], function () {
    Route::get('get_all', 'PostController@getAllPosts')->name('fetch_all');
    Route::post('create_post', 'PostController@createPost')->name('create_post');
});