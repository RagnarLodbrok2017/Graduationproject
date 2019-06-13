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
//Auth::routes();


// User Auth Routes
Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\UserAuthController@loginPage']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\UserAuthController@login']);
Route::get('register', [ 'as' => 'register', 'uses' => 'Auth\UserAuthController@registerPage']);
Route::post('register', [ 'as' => 'register', 'uses' => 'Auth\UserAuthController@register']);
Route::post('logout', [ 'as' => 'logout', 'uses' => 'Auth\UserAuthController@logout']);
// Auth User Panel
Route::group(['middleware' => 'User'], function (){
//    Route::resource('/dashboard/users', 'UserController');
    Route::get('/dashboard', function () {
        return view('UserDashboard.master');
    });
    Route::get('/dashboard/favourites', function () {
        return view('UserDashboard.master');
    });
//    Routes HomeUserController
    Route::resource('/dashboard/posts', 'HomeUserController');
    Route::post('/dashboard/posts/like/{id}', 'HomeUserController@likePost');
    Route::post('/dashboard/posts/dislike/{id}', 'HomeUserController@dislikePost');
    Route::post('/dashboard/posts/comment', 'HomeUserController@addComment');
    Route::get('/dashboard/posts/search', 'HomeUserController@searchPost');
    Route::post('/dashboard/posts/favourite/{id}', 'HomeUserController@savePost');
//    User Profile Route
    Route::get('/dashboard/profile', 'UserController@UserPanelProfile');
//    Routes FavoriteController
    Route::resource('/dashboard/favourites/posts', 'FavouriteController');
    //Post Profile
    Route::get('/dashboard/post_profile/{id}', 'PostController@AnyPostProfile');
});
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
        return view('AdminDashboard.master');
    });
    Route::get('/admin-dashboard/histories', function () {
        return view('AdminDashboard.master');
    });
    Route::get('/admin-dashboard/profile', 'UserController@profile');
    Route::get('/admin-dashboard/user-profile/{id}', 'UserController@AnyUserProfile');
});
Route::post('/admin-dashboard/posts', 'PostController@uploadVideo')->name('post.uploadVideoRoute');
//Route::get('/admin-dashboard/users', 'UserController@initial')->name('Dashboard');



//Route::get('login', 'Auth\UserAuthController@loginPage');
//Route::get('register', 'Auth\UserAuthController@registerPage');
//Route::post('login', 'Auth\UserAuthController@login');
//Route::post('register', 'Auth\UserAuthController@register');
//Route::get('login', 'Auth\UserAuthController@loginPage');
//Route::get('register', 'Auth\UserAuthController@registerPage');
