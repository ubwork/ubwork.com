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
//Register client
Route::get('/register',['as'=>'candidate.register','uses'=>'Candidate\RegisterController@getRegister']); 
Route::post('/register',['as'=>'candidate.register','uses'=>'Candidate\RegisterController@postRegister']); 
//client

//client
Route::get('/', function () {
    return view('client.home');
});
Route::get('/login',['as'=>'candidate.login','uses'=>'Client\Auth\LoginController@getLogin']);
Route::post('/login',['as'=>'candidate.login','uses'=>'Client\Auth\LoginController@postLogin']);

//company
Route::get('company/register', ['as'=>'company.register','uses'=>'Company\RegisterController@getRegister']);
Route::post('company/register', ['as'=>'register.store','uses'=>'Company\RegisterController@postRegister']);



Route::get('company/logout', ['as'=>'logout','uses'=>'Company\LoginController@getLogout']);
Route::get('company/login', ['as'=>'company.login','uses'=>'Company\LoginController@getLogin']);
Route::post('company/login', ['as'=>'company.login','uses'=>'Company\LoginController@postLogin']);
//admin
Route::get('admin/login', ['as'=>'login','uses'=>'Admin\LoginController@getLogin']);
Route::post('admin/login', ['as'=>'login','uses'=>'Admin\LoginController@postLogin']);


Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
