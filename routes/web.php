<?php
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
//Route::get('/userdashboard/user', function () {
//    return view('UserDashboard.user.user');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('User');

// Auth Admin Panel
Route::get('/admin-dashboard/login', 'Auth\AdminAuthController@loginPage');
Route::get('/admin-dashboard/register', 'Auth\AdminAuthController@registerPage');
Route::post('/admin-dashboard/login', 'Auth\AdminAuthController@login')->name('AdminLogin');
Route::post('/admin-dashboard/register', 'Auth\AdminAuthController@register')->name('AdminRegister');
Route::get('/admin-dashboard/logout', 'Auth\AdminAuthController@logout')->name('AdminLogout');
Route::group(['middleware' => 'Admin'], function (){
    Route::resource('/admin-dashboard/users', 'UserController');
    Route::resource('/admin-dashboard/posts', 'PostController');
    Route::get('/admin-dashboard', function () {
        return view('AdminDashboard.home');
    });
    Route::get('/admin-dashboard/categories', function () {
        return view('AdminDashboard.users.users');
    });
    Route::get('/admin-dashboard/profile', 'UserController@profile');
});
Route::post('/admin-dashboard/posts', 'PostController@uploadVideo')->name('post.uploadVideoRoute');
//Route::get('/admin-dashboard/users', 'UserController@initial')->name('Dashboard');

