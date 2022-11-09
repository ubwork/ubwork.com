<?php

use App\Http\Controllers\client\Applied_jobsController;
use App\Http\Controllers\client\CandidateController;
use App\Http\Controllers\client\CompanyController;
use App\Http\Controllers\client\JobController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\JobPostactivitiesController;
use App\Http\Controllers\client\ShortlistedController;
use App\Models\Candidate;
use App\Models\Shortlisted;
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
//Register client
Route::get('/register', ['as' => 'candidate.register', 'uses' => 'Candidate\RegisterController@getRegister'])->name('register');
Route::post('/register', ['as' => 'candidate.register', 'uses' => 'Candidate\RegisterController@postRegister']);
//client

//client
Route::get('/', function () {
    return view('client.home');
});
Route::get('/dashboard', function () {
    return view('client.candidate.dashboard');
});
// Route::get('/', [, 'category'])->name('category');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/job', [JobController::class, 'job'])->name('job');
Route::get('/job-cat/{id}', [JobController::class, 'job_cat'])->name('job-cat');
Route::get('/job-detail/{id}', [JobController::class, 'detail'])->name('job-detail');
//candidate
// Route::get('/candidate', [CandidateController::class, 'index'])->name('index');
Route::get('/candidate-detail', [CandidateController::class, 'detail'])->name('detail');
Route::post('/candidate-profile-edit', [CandidateController::class, 'update'])->name('update');

Route::get('/shortlisted-job', [ShortlistedController::class, 'shortlisted_job'])->name('shortlisted_job');
Route::get('/shortlisted/{id}', [ShortlistedController::class, 'shortlisted'])->name('shortlisted');
Route::get('/delete-shortlisted/{id}', [ShortlistedController::class, 'destroy'])->name('delete_shortlisted');

Route::get('/applied/{id}', [JobPostActivitiesController::class, 'applied'])->name('applied');
Route::get('/jobApply', [JobPostActivitiesController::class, 'jobApply'])->name('jobApply');
Route::get('/delete-applied-job/{id}', [JobPostActivitiesController::class, 'destroy'])->name('delete_applied_jobs');

Route::get('/applied-job', function () {
    return view('client.candidate.applied-job');
});
// Route::get('/candi', function () {
//     return view('client.candidate.candi-list');
// });
Route::get('/candi-detail', function () {
    return view('client.candidate.candi-detail');
});
//client/company
Route::get('/company-list', [CompanyController::class, 'index'])->name('company-list');
// Route::get('/company', function () {
//     return view('client.company.company');
// });
Route::get('/company-detail/{id}', [CompanyController::class, 'detail'])->name('company-detail');
Route::get('/company-feedback/{id}', [CompanyController::class, 'feedback'])->name('feedback');
Route::post('/feedback/{id}', [CompanyController::class, 'saveFeedback'])->name('saveFeedback');

Route::get('/cv', function () {
    return view('client.upcv.cv');
});
//company

//admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
Route::get('/login', ['as' => 'candidate.login', 'uses' => 'Client\Auth\LoginController@getLogin']);
Route::post('/login', ['as' => 'candidate.login', 'uses' => 'Client\Auth\LoginController@postLogin']);
Route::get('/logout', ['as' => 'candidate.logout', 'uses' => 'Client\Auth\LoginController@getLogout']);
//company
Route::get('company/register', ['as' => 'company.register', 'uses' => 'Company\RegisterController@getRegister']);
Route::post('company/register', ['as' => 'register.store', 'uses' => 'Company\RegisterController@postRegister']);


Route::get('company/login', ['as' => 'company.login', 'uses' => 'Company\LoginController@getLogin']);
Route::post('company/login', ['as' => 'company.login', 'uses' => 'Company\LoginController@postLogin']);
//admin
Route::get('admin/login', ['as' => 'login', 'uses' => 'Admin\LoginController@getLogin']);
Route::post('admin/login', ['as' => 'login', 'uses' => 'Admin\LoginController@postLogin']);


Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
