<?php

use App\Http\Controllers\client\CandidateController;
use App\Http\Controllers\client\CompanyController;
use App\Http\Controllers\client\JobController;
use App\Http\Controllers\client\HomeController;
use App\Models\Candidate;
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

Route::get('/', function () {
    return view('client.home');
});
Route::get('/dashboard', function () {
    return view('client.candidate.dashboard');
});
// Route::get('/', [, 'category'])->name('category');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/job', [JobController::class, 'job'])->name('job');
Route::get('/job-detail/{id}', [JobController::class, 'detail'])->name('job-detail');
//candidate
Route::get('/candidate', [CandidateController::class, 'index'])->name('index');
Route::get('/candidate-detail/{id}', [CandidateController::class, 'detail'])->name('detail');
Route::get('/shortlisted-job', function () {
    return view('client.candidate.shortlisted-job');
});
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
Route::get('/company', [CompanyController::class, 'index'])->name('index');
// Route::get('/company', function () {
//     return view('client.company.company');
// });
Route::get('/company-detail/{id}', [CompanyController::class, 'detail'])->name('company-detail');

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
Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('change-language');
