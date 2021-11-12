<?php

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
Auth::routes();

Route::get('/', 'PagesController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/categoryproduct', 'CategoryProductController');
    Route::resource('/categorycontent', 'CategoryContentController');
    Route::resource('/listproduct', 'ListProductController');
    Route::resource('/listcontent', 'ListContentController');
    Route::resource('/tag', 'ListTagController');
    Route::resource('/catalog', 'ListCatalogController');
    Route::resource('/jumbotron', 'JumbotronController');
    Route::resource('/user', 'UserController');
    Route::resource('/password', 'PasswordController');
});
