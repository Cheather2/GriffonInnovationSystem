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

Route::get('/', function () {
    return view('welcome');
});

Route::get('account', ['middleware' => 'auth', function () {
    return view('Users/account');
}]);

Route::get('/advisors', ['middleware' => 'auth',function () {
    return view('/advisors');
}]);

Route::get('/fyp', ['middleware' => 'auth',function () {
    return view('/home');
}]);

Route::get('/FYP/createdView', ['middleware' => 'auth',function () {
    return view('/FYP/createdView');
}]);

Route::get('/FYP/searchView', ['middleware' => 'auth',function () {
    return view('/FYP/searchView');
}]);

Route::get('/FYP/studentView', ['middleware' => 'auth',function () {
    return view('/FYP/studentView');
}]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('fyps/studentSearchFyp', 'FypController@studentSearchFyp');

Route::resource('users', 'UserController', ['middleware' => 'auth',]);

Route::resource('degrees', 'DegreeController', ['middleware' => 'auth',]);

Route::post('fyps/searchFyp', 'FypController@searchFyp', ['middleware' => 'auth',]);
Route::resource('fyps', 'FypController', ['middleware' => 'auth',]);

Route::post('fyps/delete', 'FypController@delete', ['middleware' => 'auth',]);
Route::resource('fyps', 'FypController', ['middleware' => 'auth',]);

Route::post('courses/searchDeg', 'CourseController@searchDeg', ['middleware' => 'auth',]);
Route::resource('courses', 'CourseController', ['middleware' => 'auth',]);

Route::post('rules/search', 'RuleController@search', ['middleware' => 'auth',]);
Route::resource('rules', 'RuleController', ['middleware' => 'auth',]);