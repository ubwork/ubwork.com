<?php

use Illuminate\Support\Facades\Route;

Route::get('', function () {
    $activeRoute='dashboard';
    $title = "Tổng quản";
    return view('company.dashboard',compact('activeRoute','title'));
})->name('home');
Route::get('/dashboard', function () {
    return redirect()->route('company.home');
});
Route::post('/logout',"Company\LoginController@logOut")->name('logOut');
Route::prefix('post')->name('post.')->group(function () {
    Route::get('/','Company\PostController@index')->name('index');
    Route::get('create','Company\PostController@create')->name('create');
});
