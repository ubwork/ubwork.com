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

//client
Route::get('/', function () {
    return view('client.home');
});
//company
Route::get('register', ['as'=>'register','uses'=>'Company\RegisterController@getRegister']);
Route::post('register', ['as'=>'register','uses'=>'Company\RegisterController@postRegister']);

Route::get('company/login', ['as'=>'login','uses'=>'Company\LoginController@getLogin']);
Route::post('company/login', ['as'=>'login','uses'=>'Company\LoginController@postLogin']);
//admin
Route::get('admin/login', ['as'=>'login','uses'=>'Admin\LoginController@getLogin']);
Route::post('admin/login', ['as'=>'login','uses'=>'Admin\LoginController@postLogin']);


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
