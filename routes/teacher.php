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

Route::post('/submittest', [Auth::class, 'submittest']);

Route::post('/submitdegree', [Auth::class, 'submitdegree']);

Route::post('/createclass', [Auth::class, 'createClass']);

Route::get('/getclassroom/{id}', [Auth::class, 'getClass']);

Route::post('/postMeetingLink', [Auth::class, 'postMeetingLink']);

Route::post('/postLecture', [Auth::class, 'postLecture']);

