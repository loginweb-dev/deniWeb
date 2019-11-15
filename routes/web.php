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

Route::get('/', 'FrontendController@index');
Route::get('/empresa/{slug?}', 'FrontendController@show')->name('company');
Route::get('/empresa/like/{slug}','FrontendController@like')->middleware('auth')->name('like');
Route::get('/search', 'FrontendController@search')->name('buscar');
Route::get('/categoria/{slug?}', 'FrontendController@get_category')->name('lista_categoria');
Route::get('login/{social}', 'SocialController@redirectToProvider')->name('loginFacebook');
Route::get('login/{social}/callback', 'SocialController@handleProviderCallback');

Route::get('/view/{id}', 'FrontendController@views')->name('vista');
Route::get('/orderby/{id}', 'FrontendController@orderby')->name('orderby');
//rutas para el chats
Route::get('/chats','FrontendController@private')->name('chats');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
