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
Route::resource('/admin-dashboard/users', 'Api\UserController');
Route::resource('/admin-dashboard/categories', 'Api\CategoryController');
Route::resource('/admin-dashboard/histories', 'Api\HistoryController');
Route::resource('/admin-dashboard/posts', 'Api\PostController');
Route::post('/admin-dashboard/histories/{id}', 'Api\HistoryController@deleteHistories');
Route::get('/admin-dashboard/posts/{id}', 'Api\PostController@uploadVideo');
Route::get('/admin-dashboard/profile/{id}', 'Api\UserController@UserProfile');
Route::get('/admin-dashboard/user-profile/{id}', 'Api\UserController@UserProfile');


//UserPanel Routes
Route::get('/dashboard/profile/{id}', 'Api\UserController@UserProfile');
Route::get('/dashboard/post_profile/{id}', 'Api\PostController@AnyPostProfile');
