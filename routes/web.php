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


//admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

//company
Route::prefix('company')->name('company.')->group(function () {
    Route::get('/', 'Admin\CompanyController@index')->name('index');
    Route::match(['get', 'post'], 'store', 'Admin\CompanyController@store')->name('store');
    Route::get('show/{id}', 'Admin\CompanyController@show')->name('show');
    Route::post('edit/{id}', 'Admin\CompanyController@edit')->name('edit');
    Route::get('destroy/{id}', 'Admin\CompanyController@destroy')->name('destroy');
});
