<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function ()
{
    return view('welcome');
});

//Header Links
Route::get('/home', 'UserController@home');
Route::get('/aboutus', 'UserController@aboutus');
Route::get('/contact', 'UserController@contact');
Route::get('/menu', 'UserController@menu');
Route::get('/admin', 'UserController@admin');

//Admin Use Cases
Route::post('/AddMenuItems','AdminController@addMenu');
Route::post('/UpdateHome','AdminController@changeHome');
Route::post('/UpdateAboutUs','AdminController@changeAbout');
Route::post('/UpdateContact','AdminController@changeContact');



//User Use Cases
Route::post('/Contactmail','UserController@contactme');
Route::post('/ChangePassword','UserController@resetpass');
Route::get('/Order','UserController@order');

//Logging in
Route::post('/homepage','UserController@LoginUser');

//Registering a new user
Route::post('/user','UserController@AddUser');



