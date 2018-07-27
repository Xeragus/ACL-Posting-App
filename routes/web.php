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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/account', 'HomeController@getAccount')->name('account');
Route::post('/users', 'HomeController@getUsers')->name('users');
Route::post('/createpost', 'PostController@onCreatePost')->name('post.create');
Route::get('/cookieget', 'CookieController@getCookie');
Route::get('/cookieset', 'CookieController@setCookie');

Route::get('/logout', [
    'uses' => 'HomeController@logout',
    'as' => 'logout'
]);

Route::get('/guest', [
    'uses' => 'HomeController@getGuest',
    'as' => 'guest',
    'middleware' => 'roles',
    'roles' => ['guest']
]);

Route::get('/admin', [
    'uses' => 'HomeController@getAdmin',
    'as' => 'admin'
]);

Route::get('/author', [
    'uses' => 'HomeController@getAuthor',
    'as' => 'author'
]);

Route::get('/roles', [
    'uses' => 'HomeController@getRoles',
    'as' => 'roles'
]);

Route::post('/assignRoles', [
    'uses' => 'HomeController@assignRoles',
    'as' => 'assignRoles'
]);