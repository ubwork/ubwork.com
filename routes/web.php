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


//admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

//company
Route::prefix('company')->name('company.')->group(function () {
    Route::get('/', 'CompanyController@index')->name('index');
    Route::match(['get', 'post'], 'store', 'CompanyController@store')->name('store');
    Route::get('show/{id}', 'CompanyController@show')->name('show');
    Route::post('edit/{id}', 'CompanyController@edit')->name('edit');
    Route::get('destroy/{id}', 'CompanyController@destroy')->name('destroy');
});

Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
