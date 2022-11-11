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
// Register client
Route::get('/register', ['as' => 'candidate.register', 'uses' => 'Candidate\RegisterController@getRegister'])->name('register');
Route::post('/register', ['as' => 'candidate.register', 'uses' => 'Candidate\RegisterController@postRegister']);
//login
Route::get('/login', ['as' => 'candidate.login', 'uses' => 'Client\Auth\LoginController@getLogin']);
Route::post('/login', ['as' => 'candidate.login', 'uses' => 'Client\Auth\LoginController@postLogin']);
Route::get('/logout', ['as' => 'candidate.logout', 'uses' => 'Client\Auth\LoginController@getLogout']);

//candidate
Route::get('/','client\HomeController@index')->name('index');
Route::get('/job','client\JobController@job')->name('job');
Route::get('/job-cat/{id}','client\JobController@job_cat')->name('job-cat');
Route::get('/job-detail/{id}','client\JobController@detail')->name('job-detail');

Route::get('/candidate-detail','client\CandidateController@detail')->name('detail');
Route::post('/candidate-profile-edit', 'client\CandidateController@update')->name('update');

Route::get('/seeker', 'client\SeekerController@index')->name('index');
Route::post('/seeker', 'client\SeekerController@store')->name('store');

Route::get('/shortlisted-job', 'client\ShortlistedController@shortlisted_job')->name('shortlisted_job');
Route::get('/shortlisted/{id}', 'client\ShortlistedController@shortlisted')->name('shortlisted');
Route::get('/delete-shortlisted/{id}', 'client\JobPostActivitiesController@destroy')->name('delete_shortlisted');

Route::get('/applied/{id}', 'client\JobPostActivitiesController@applied')->name('applied');
Route::get('/jobApply', 'client\JobPostActivitiesController@jobApply')->name('jobApply');
Route::get('/delete-applied-job/{id}', 'client\JobPostActivitiesController@destroy')->name('delete_applied_jobs');

Route::get('/applied-job', function () {
    return view('client.candidate.applied-job');
});

Route::get('/candi-detail', function () {
    return view('client.candidate.candi-detail');
});
//client/company
Route::get('/company-list', 'client\CompanyController@index')->name('company-list');

Route::get('/company-detail/{id}', 'client\CompanyController@detail')->name('company-detail');
Route::get('/company-feedback/{id}', 'client\CompanyController@feedback' )->name('feedback');
Route::post('/feedback/{id}', 'client\CompanyController@saveFeedback')->name('saveFeedback');

//company
Route::get('company/register', ['as' => 'company.register', 'uses' => 'Company\RegisterController@getRegister']);
Route::post('company/register', ['as' => 'register.store', 'uses' => 'Company\RegisterController@postRegister']);

Route::get('company/login', ['as' => 'company.login', 'uses' => 'Company\LoginController@getLogin']);
Route::post('company/login', ['as' => 'company.login', 'uses' => 'Company\LoginController@postLogin']);

//admin
Route::get('admin/login', ['as' => 'login', 'uses' => 'Admin\LoginController@getLogin']);
Route::post('admin/login', ['as' => 'login', 'uses' => 'Admin\LoginController@postLogin']);


Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
