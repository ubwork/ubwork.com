<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\ProfileController;

Route::get('/dashboard', function () {
    return view('company.dashboard');
});

Route::get('profile/{id}',['as'=>'profile','uses'=>'Company\ProfileController@edit']);
Route::post('profile/{id}',['as'=>'profile.update','uses'=>'Company\ProfileController@update']);
// Route::group([], function(){
//     Route::resource('profile', ProfileController::class);
// });