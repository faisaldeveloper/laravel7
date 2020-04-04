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


Route::get('/allcategories', 'CategoryController@showall')->name('fetch_all');
//Route::get('/showallcategories', function () {    return 'in test controller'; });


Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'post'], function () {
    Route::get('get_all', 'PostController@getAllPosts')->name('fetch_all');
    Route::post('create_post', 'PostController@createPost')->name('create_post');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('allproducts', 'ProductController@index');