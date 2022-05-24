<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\Auth;

Route::get('/signupteacher', function () {
    return Inertia::render('Teacher/Signup');
})->name("teachersignup");

Route::post('/createteacher', [Auth::class, 'Signup']);

Route::post('/loginteacher', [Auth::class, 'Login'])->name("loginteacher");

Route::get('/loginteacher', function () {
    return Inertia::render('Teacher/Login');
})->name("teacherlogin");


