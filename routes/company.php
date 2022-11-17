<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\ProfileController;

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
    Route::get('/','Company\JobPostController@index')->name('index');
    Route::get('create','Company\JobPostController@create')->name('create');
    Route::POST('store','Company\JobPostController@store')->name('store');
    Route::get('edit/{id}','Company\JobPostController@edit')->name('edit');
    Route::post('update/{id}', 'Company\JobPostController@update')->name('update');
    Route::get('profileApply/{id}', 'Company\JobPostController@profileApply')->name('profileApply');
});
Route::get('/favorite','Company\FavoriteController@index')->name('favorite');

Route::get('profile',['as'=>'profile','uses'=>'Company\ProfileController@edit']);
Route::post('profile',['as'=>'profile.update','uses'=>'Company\ProfileController@update']);
Route::get('filter',['as'=>'filter','uses'=>'Company\FilterCvController@index']);
// Route::post('filter',['as'=>'filter.update','uses'=>'Company\ProfileController@update']);

Route::get('image-paper',['as'=>'image-paper','uses'=>'Company\ImagePaperController@index']);
Route::post('image-paper',['as'=>'image-paper.update','uses'=>'Company\ImagePaperController@update']);
