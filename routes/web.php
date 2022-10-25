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


    //company
    Route::prefix('company')->name('company.')->group(function () {
        Route::get('list', 'CompanyController@index')->name('List');
        Route::get('add', 'CompanyController@create')->name('Add');
        Route::post('add', 'CompanyController@store')->name('Save');
        Route::get('detail/{id}', 'CompanyController@show')->name('detail');
        Route::post('update/{id}', 'CompanyController@edit')->name('update');
    });
});
