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

Route::get('/', function () {
    return view('client.home');
});
//company

//admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('list', 'CustomerController@index')->name('list');
        Route::get('add', 'CustomerController@create')->name('add');
        Route::post('add', 'CustomerController@store')->name('saveAdd');
        Route::get('edit/{id}', 'CustomerController@edit')->name('edit');
        Route::post('edit/{id}', 'CustomerController@update')->name('SaveUpdate');
        Route::any('delete/{id}', 'CustomerController@destroy')->name('delete');
    });
});
Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
