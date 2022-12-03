<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/contact', 'client\ContactController@index')->name('contact');
Route::post('/contact', 'client\ContactController@contact')->name('post_contact');

Route::get('/blog', 'client\BlogController@index')->name('blog');
Route::get('/blog_detail/{id}', 'client\BlogController@detail')->name('blog_detail');
Route::get('/search_blog', 'client\BlogController@searchByTitle');

Route::get('/search/title', 'client\HomeController@searchByTitle');
Route::get('/search/title-cat/{id}', 'client\JobController@searchByTitle');

Route::get('/choose-login', 'client\HomeController@choose')->name('choose');
Route::get('/search/title', 'Client\HomeController@searchByTitle');
Route::get('/search/title-cat/{id}', 'Client\JobController@searchByTitle');
// Register Client
Route::get('/register', ['as' => 'candidate.register', 'uses' => 'Candidate\RegisterController@getRegister'])->name('register');
Route::post('/register', ['as' => 'candidate.register', 'uses' => 'Candidate\RegisterController@postRegister']);
Route::get('/actived/{candidate}/{token}', 'Candidate\RegisterController@actived')->name('actived');
Route::get('404', function () {
    return view('email.404');
});
Route::get('refresh-pass', 'Candidate\RegisterController@refresh')->name('refresh');
Route::post('refresh-pass', 'Candidate\RegisterController@refreshPass')->name('refreshPass');
Route::get('get-pass/{candidate}/{token}', 'Candidate\RegisterController@getPass')->name('getPass');
Route::post('get-pass/{candidate}/{token}', 'Candidate\RegisterController@postPass')->name('postPass');
//login
Route::get('/login', ['as' => 'candidate.login', 'uses' => 'Client\Auth\LoginController@getLogin']);
Route::post('/login', ['as' => 'candidate.login', 'uses' => 'Client\Auth\LoginController@postLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Client\Auth\LoginController@logout']);
// login google
Route::get('/googleLogin', 'Client\Auth\LoginGoogleController@getGoogleLoginClient')->name('getGoogleLoginClient');
Route::get('/googleLogin/callback', 'Client\Auth\LoginGoogleController@loginClientCallback');

//candidate
Route::get('/', 'Client\HomeController@index')->name('index');
Route::get('/search', 'Client\HomeController@search')->name('search');
Route::get('/send', 'Client\MailController@send')->name('send');
Route::get('/job-speed', 'Client\MailController@jobspeed')->name('jobspeed');
Route::get('/job-speed-apply', 'Client\MailController@speedapply')->name('speedapply');

Route::get('/job', 'Client\JobController@jobPost')->name('job');
Route::get('/job-cat/{id}', 'Client\JobController@job_cat')->name('job-cat');
Route::get('/job-detail/{id}', 'Client\JobController@detail')->name('job-detail');
Route::post('/job-searchs', 'Client\JobController@searchs')->name('searchs');

Route::get('/change-password', 'Client\CandidateController@change')->name('change_password');
Route::post('/update_password', 'Client\CandidateController@update_pass')->name('update_pass');
Route::get('/candidate-detail/{id}', 'Client\CandidateController@detail')->name('detail');
Route::post('/candidate-profile-edit/{id}', 'Client\CandidateController@update')->name('update');
Route::post('/status/{candidate}&{type}', 'Client\CandidateController@status')->name('status');

Route::get('/seeker', 'Client\SeekerController@index')->name('seeker');
Route::post('/seeker', 'Client\SeekerController@store')->name('store');
Route::get('/delete-seeker/{id}', 'Client\SeekerController@destroy')->name('delete_seeker');

Route::get('/shortlisted-job', 'Client\ShortlistedController@shortlisted_job')->name('shortlisted_job');
Route::get('/shortlisted/{id}', 'Client\ShortlistedController@shortlisted')->name('shortlisted');
Route::get('/delete-shortlisted/{id}', 'Client\ShortlistedController@destroy')->name('delete_shortlisted');

Route::get('/shortlisted-company/{id}', 'Client\ShortlistCompanyController@shortlisted_company')->name('shortlisted_company');
Route::get('/shortlisted-list-company', 'Client\ShortlistCompanyController@shortlisted')->name('shortlisted_list_company');
Route::get('/delete-shortlisted-company/{id}', 'Client\ShortlistCompanyController@destroy')->name('delete_shortlisted_company');

Route::get('/applied/{id}', 'Client\JobPostActivitiesController@applied')->name('applied');
Route::get('/jobApply', 'Client\JobPostActivitiesController@jobApply')->name('jobApply');
Route::get('/delete-applied-job/{id}', 'Client\JobPostActivitiesController@destroy')->name('delete_applied_jobs');

Route::get('/applied-job', function () {
    return view('Client.candidate.applied-job');
});

Route::get('/candi-detail', function () {
    return view('Client.candidate.candi-detail');
});
//Client/company
Route::get('/company-list', 'Client\CompanyController@index')->name('company-list');
Route::post('/company-filter', 'Client\CompanyController@filter')->name('company-filter');

Route::get('/company-detail/{id}', 'Client\CompanyController@detail')->name('company-detail');
Route::get('/company-feedback/{id}', 'Client\CompanyController@feedback')->name('feedback');
Route::post('/feedback/{id}', 'Client\CompanyController@saveFeedback')->name('saveFeedback');

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

Route::get('package', 'Client\CoinController@getListPackage')->name('listPackage');
Route::post('insertInvoice', 'Client\CoinController@insertInvoice')->name('insertInvoice');
Route::post('payment', 'Client\CoinController@payment')->name('payment');
Route::get('vnpay_return', 'Client\CoinController@vnpay_return')->name('vnpay_return');
Route::get('vnpay_ipn', 'Client\CoinController@vnpay_ipn')->name('vnpay_ipn');
Route::get('detail-candidates/{id}', 'Client\DetailCandidateController@index')->name('detail-candidate.index');
Route::get('historyPayment', 'Client\CoinController@historyPayment')->name('historyPayment');

Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
