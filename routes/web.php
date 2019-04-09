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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin-dashboard/users', 'UserController@initial')->name('Dashboard');
Route::resource('/admin-dashboard/user', 'UserController');
Route::get('/admin-dashboard', function () {
    return view('AdminDashboard.home');
});
