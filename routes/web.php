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


    //company
    Route::prefix('company')->name('company.')->group(function () {
        Route::get('list', 'CompanyController@index')->name('list');
        Route::match(['get', 'post'], 'add', 'CompanyController@store')->name('add');
        Route::get('detail/{id}', 'CompanyController@show')->name('detail');
        Route::post('update/{id}', 'CompanyController@edit')->name('update');
        Route::get('delete/{id}', 'CompanyController@destroy')->name('delete');
    });
});
Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
