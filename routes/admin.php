<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::resource('user', 'Admin\UserController');
Route::resource('role', 'Admin\RoleController');
Route::resource('permission', 'Admin\PermissionController');
