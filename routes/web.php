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
// Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });
use  App\Http\Controllers\SMSController;

Route::get('/',"App\Http\Controllers\SMSController@index")->name('SMS.index');
Route::get('/create', "App\Http\Controllers\SMSController@create");
Route::post('/store', "App\Http\Controllers\SMSController@store") ;
Route::get('/edit/{id}',"App\Http\Controllers\SMSController@edit")->name('SMS.edit');
Route::get('/show/{id}',"App\Http\Controllers\SMSController@show");
Route::post('/update/{id}',"App\Http\Controllers\SMSController@update");




