<?php

use Illuminate\Http\Request;

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

// Login and Register
Route::post('/login/social', 'ApiController@login_social');
Route::post('/profile/update', 'ApiController@profile_update');

Route::get('/{user_id}', 'ApiController@index');
Route::get('/company/favorites/{user_id}', 'ApiController@company_favorites');
Route::get('/company/{id}', 'ApiController@company');
Route::get('/company/like/{id}/{user_id}/{value}', 'ApiController@company_like');
