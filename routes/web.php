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

//client
Route::get('/', function () {
    return view('client.home');
});
Route::get('/job', function () {
    return view('client.job.job');
});
Route::get('/job-detail', function () {
    return view('client.job.job-detail');
});
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
//company

//admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
