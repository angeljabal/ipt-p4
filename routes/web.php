<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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


Route::get('/register', 'AuthController@registrationForm');
Route::post('/register', 'AuthController@register');
Route::get('/login', 'AuthController@loginForm');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::get('/verification/{user}/{token}', 'AuthController@verification');


Route::get('/items', 'ItemController@index');
Route::get('/items/create', 'ItemController@create');
Route::post('/items', 'ItemController@store');
Route::get('/items/edit/{item}', 'ItemController@edit');
Route::delete('/items', 'ItemController@delete');
Route::patch('/items/{item}', 'ItemController@update');
Route::get('/logs', 'SiteController@logs');
Route::get('/','SiteController@index');

