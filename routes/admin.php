<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::resource('user', 'Admin\UserController');

Route::prefix('candidate')->name('candidate.')->group(function () {
    Route::get('/', 'Admin\CandidateController@index')->name('index');
    Route::get('create', 'Admin\CandidateController@create')->name('create');
    Route::post('store', 'Admin\CandidateController@store')->name('store');
    Route::get('edit/{id}', 'Admin\CandidateController@edit')->name('edit');
    Route::post('update/{id}', 'Admin\CandidateController@update')->name('update');
    Route::any('/{id}', 'Admin\CandidateController@destroy')->name('destroy');
});