<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
Route::get('/logout', ['as'=>'logout','uses'=> 'Admin\LoginController@getLogOut']);

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
    Route::get('create', 'Admin\CompanyController@create')->name('create');
    Route::post('store', 'Admin\CompanyController@store')->name('store');
    Route::get('edit/{id}', 'Admin\CompanyController@edit')->name('edit');
    Route::post('update/{id}', 'Admin\CompanyController@update')->name('update');
    Route::delete('/{id}', 'Admin\CompanyController@destroy')->name('destroy');
    Route::post('/{id}', 'Admin\CompanyController@status')->name('status');
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
Route::prefix('major')->name('major.')->group(function () {
    Route::get('/', 'Admin\MajorController@index')->name('index');
    Route::get('create', 'Admin\MajorController@create')->name('create');
    Route::post('store', 'Admin\MajorController@store')->name('store');
    Route::get('edit/{id}', 'Admin\MajorController@edit')->name('edit');
    Route::post('update/{id}', 'Admin\MajorController@update')->name('update');
    Route::delete('/{id}', 'Admin\MajorController@destroy')->name('destroy');
});