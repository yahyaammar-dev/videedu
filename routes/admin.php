<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Auth;

Route::get('/signupadmin', function () {
    return Inertia::render('Admin/Signup');
})->name("adminsignup");

Route::post('/createadmin', [Auth::class, 'Signup']);

Route::post('/loginadmin', [Auth::class, 'Login'])->name("loginadmin");

Route::get('/loginadmin', function () {
    return Inertia::render('Admin/Login');
})->name("adminlogin");


