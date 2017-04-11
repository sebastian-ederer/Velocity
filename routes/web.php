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

Route::get('/', 'VideoController@index')->name('videos.index');

//----Contact Page Routes
Route::get('/contact', function (){
    return view ('contact.contact');
})->name('contact');

Route::post('/contact', 'ContactController@sendMail')->name('postContact');

//----End Contact Page routes

//Legal disclosure/terms routes

Route::get('/legal_disclosure', function(){
    return view ('legal_disclosure');
})->name('legal_disclosure');

Route::get('/legal_terms', function(){
    return view ('legal_terms');
})->name('legal_terms');

//End legal disclosure/terms routes

Route::resource('/websites', 'WebsiteController', ['only' => ['store', 'update', 'destroy']]);
Route::resource('/about', 'AboutController', ['except' => ['show']]);
Route::resource('/videos', 'VideoController');
Route::resource('/posts', 'PostController');

//----Auth Routes
//Login routes
Route::get('admin/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('admin/login', 'Auth\LoginController@login');
Route::get('admin/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

//Registration routes
Route::get('admin/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('admin/register', 'Auth\RegisterController@register');

//Reset Password
Route::post('admin/password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('admin/password/reset', ['as' =>'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('admin/password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);

//---- End Auth Routes

