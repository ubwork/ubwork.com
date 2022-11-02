<?php

use App\Http\Controllers\client\JobController;
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


Route::get('/', 'client\HomeController@index')->name('index');
Route::get('list', 'client\JobController@list')->name('list');
Route::get('show/{id}', 'client\JobController@show')->name('show');
//company
Route::get('register', ['as' => 'register', 'uses' => 'Company\RegisterController@getRegister']);
Route::post('register', ['as' => 'register', 'uses' => 'Company\RegisterController@postRegister']);


Route::get('company/login', ['as' => 'login', 'uses' => 'Company\LoginController@getLogin']);
Route::post('company/login', ['as' => 'login', 'uses' => 'Company\LoginController@postLogin']);
//admin
Route::get('admin/login', ['as' => 'login', 'uses' => 'Admin\LoginController@getLogin']);
Route::post('admin/login', ['as' => 'login', 'uses' => 'Admin\LoginController@postLogin']);


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Route::get('/', [, 'category'])->name('category');
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/job', function () {
        return view('client.job.job');
    });
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/candi', function () {
        return view('client.candidate.candi-list');
    });
    Route::get('/candi-detail', function () {
        return view('client.candidate.candi-detail');
    });
    Route::get('/company', function () {
        return view('client.company.company');
    });
    Route::get('/company-detail', function () {
        return view('client.company.company-detail');
    });
    Route::get('/cv', function () {
        return view('client.upcv.cv');
    });
});
//company

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
//company

Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
