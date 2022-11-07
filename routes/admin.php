<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::resource('user', 'Admin\UserController');
Route::resource('role', 'Admin\RoleController');
Route::resource('permission', 'Admin\PermissionController');

Route::prefix('candidate')->name('candidate.')->group(function () {
    Route::get('/', 'Admin\CandidateController@index')->name('index');
    Route::get('create', 'Admin\CandidateController@create')->name('create');
    Route::post('store', 'Admin\CandidateController@store')->name('store');
    Route::get('edit/{id}', 'Admin\CandidateController@edit')->name('edit');
    Route::post('update/{id}', 'Admin\CandidateController@update')->name('update');
    Route::delete('/{id}', 'Admin\CandidateController@destroy')->name('destroy');
    Route::post('/{id}', 'Admin\CandidateController@status')->name('status');
});
Route::prefix('company')->name('company.')->group(function () {
    Route::get('/', 'Admin\CompanyController@index')->name('index');
    Route::match(['get', 'post'], 'store', 'Admin\CompanyController@store')->name('store');
    Route::get('show/{id}', 'Admin\CompanyController@show')->name('show');
    Route::post('edit/{id}', 'Admin\CompanyController@edit')->name('edit');
    Route::get('destroy/{id}', 'Admin\CompanyController@destroy')->name('destroy');
});
Route::prefix('blacklist')->name('blacklist.')->group(function () {
    Route::get('candidate', 'Admin\BlacklistController@index_can')->name('index_can');
    Route::get('company', 'Admin\BlacklistController@index_cpn')->name('index_cpn');
});
Route::prefix('skill')->name('skill.')->group(function () {
    Route::get('/', 'Admin\SkillController@index')->name('index');
    Route::get('create', 'Admin\SkillController@create')->name('create');
    Route::post('store', 'Admin\SkillController@store')->name('store');
    Route::get('edit/{id}', 'Admin\SkillController@edit')->name('edit');
    Route::post('update/{id}', 'Admin\SkillController@update')->name('update');
    Route::delete('/{id}', 'Admin\SkillController@destroy')->name('destroy');
});
