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
Route::get('/logout', ['as' => 'logout', 'uses' => 'Client\Auth\LoginController@logout']);

//candidate
Route::get('/', 'client\HomeController@index')->name('index');
Route::get('/job', 'client\JobController@job')->name('job');
Route::get('/job-cat/{id}', 'client\JobController@job_cat')->name('job-cat');
Route::get('/job-detail/{id}', 'client\JobController@detail')->name('job-detail');

Route::get('/change-password', 'client\CandidateController@change')->name('change_password');
Route::post('/update_password', 'client\CandidateController@update_pass')->name('update_pass');
Route::get('/candidate-detail/{id}', 'client\CandidateController@detail')->name('detail');
Route::post('/candidate-profile-edit/{id}', 'client\CandidateController@update')->name('update');

Route::get('/seeker', 'client\SeekerController@index')->name('seeker');
Route::post('/seeker', 'client\SeekerController@store')->name('seeker-store');
Route::get('/delete-seeker/{id}', 'client\SeekerController@destroy')->name('delete_seeker');

Route::get('/shortlisted-job', 'client\ShortlistedController@shortlisted_job')->name('shortlisted_job');
Route::get('/shortlisted/{id}', 'client\ShortlistedController@shortlisted')->name('shortlisted');
Route::get('/delete-shortlisted/{id}', 'client\ShortlistedController@destroy')->name('delete_shortlisted');

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
Route::post('/company-filter', 'client\CompanyController@filter')->name('company-filter');

Route::get('/company-detail/{id}', 'client\CompanyController@detail')->name('company-detail');
Route::get('/company-feedback/{id}', 'client\CompanyController@feedback')->name('feedback');
Route::post('/feedback/{id}', 'client\CompanyController@saveFeedback')->name('saveFeedback');

//company
Route::get('company/register', ['as' => 'company.register', 'uses' => 'Company\RegisterController@getRegister']);
Route::post('company/register', ['as' => 'register.store', 'uses' => 'Company\RegisterController@postRegister']);

Route::get('company/login', ['as' => 'company.login', 'uses' => 'Company\LoginController@getLogin']);
Route::post('company/login', ['as' => 'company.login', 'uses' => 'Company\LoginController@postLogin']);

//admin
Route::get('admin/login', ['as' => 'login', 'uses' => 'Admin\LoginController@getLogin']);
Route::post('admin/login', ['as' => 'login', 'uses' => 'Admin\LoginController@postLogin']);

// create CV
// info CV
Route::get('create-cv', 'Client\CreateCvController@index')->name('CreateCV');
Route::post('create-cv/saveInfo', 'Client\CreateCvController@saveInfo')->name('saveInfo');
Route::post('create-cv/updateInfo', 'Client\CreateCvController@updateInfo')->name('updateInfo');

//experiences
Route::post('create-cv/saveExperience', 'Client\CreateCvController@saveExperience')->name('saveExperience');
Route::post('create-cv/updateExperience/{id}', 'Client\CreateCvController@updateExperience')->name('updateExperience');
Route::get('create-cv/deleteExperience/{id}', 'Client\CreateCvController@deleteExperience')->name('deleteExperience');

//skills
Route::post('create-cv/saveSkills', 'Client\CreateCvController@saveSkills')->name('saveSkills');
Route::post('create-cv/updateSkills/{id}', 'Client\CreateCvController@updateSkills')->name('updateSkills');
Route::get('create-cv/DeleteAllSkill/{id}', 'Client\CreateCvController@DeleteAllSkill')->name('DeleteAllSkill');

//educations
Route::post('create-cv/saveEducation', 'Client\CreateCvController@saveEducation')->name('saveEducation');
Route::post('create-cv/updateEducation/{id}', 'Client\CreateCvController@updateEducation')->name('updateEducation');
Route::get('create-cv/deleteEducation/{id}', 'Client\CreateCvController@deleteEducation')->name('deleteEducation');

//certificates
Route::post('create-cv/saveCertificate', 'Client\CreateCvController@saveCertificate')->name('saveCertificate');
Route::post('create-cv/updateCertificate/{id}', 'Client\CreateCvController@updateCertificate')->name('updateCertificate');
Route::get('create-cv/deleteCertificate/{id}', 'Client\CreateCvController@deleteCertificate')->name('deleteCertificate');

Route::get('create-cv/getPdf', 'Client\CreateCvController@getPdf')->name('getPdf');

Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
