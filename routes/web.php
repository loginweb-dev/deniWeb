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

Route::get('/home', function(){
    return redirect()->route('landingpage');
});
Route::get('/policies', function(){
    return('policies');
});

Route::get('/', 'FrontendController@index')->name('landingpage');
Route::get('/filter/{order}/{category}/{search}', 'FrontendController@companies_list');
Route::get('/empresa/{slug?}', 'FrontendController@show')->name('company');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::get('/categoria/{slug?}', 'FrontendController@get_category')->name('lista_categoria');
Route::get('login/{social}', 'SocialController@redirectToProvider')->name('loginFacebook');
Route::get('login/{social}/callback', 'SocialController@handleProviderCallback');

Route::get('/empresa/rating/{slug}/{rating}/{request}','FrontendController@rating')->middleware('auth')->name('rating');
Route::get('/empresa/like/{slug}/{request}','FrontendController@like')->middleware('auth')->name('like');

Route::get('/view/{id}', 'FrontendController@views')->name('vista');
Route::get('/orderby/{id}', 'FrontendController@orderby')->name('orderby');
//rutas para el chats
Route::get('/chats','FrontendController@private')->name('chats');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Panel de control para el cliente
Route::get('admin/negocios', 'BusineController@negocios_index')->name('negocios_index');
Route::get('admin/negocios/create', 'BusineController@negocios_create')->name('negocios_create');
Route::post('admin/negocios/store', 'BusineController@negocios_store')->name('negocios_store');
Route::get('admin/negocios/{id}/view', 'BusineController@negocios_view');
Route::get('admin/negocios/{id}/list_images', 'BusineController@list_images')->name('list_images');
Route::post('admin/negocios/{id}/add_images', 'BusineController@add_images')->name('add_images');
Route::post('admin/negocios/update', 'BusineController@negocios_update')->name('negocios_update');

Route::get('admin/forget_redirect', 'FrontendController@forget_redirect');