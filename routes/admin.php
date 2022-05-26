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


Route::get('/adminviewteacher/{adminid}/{id}',[Auth::class,'viewteacher']);

Route::post('/adminverifyteacher',[Auth::class,'verifyteacher']);

Route::post('/addquestion',[Auth::class,'addQuestion']);

Route::post('/accepttest',[Auth::class,'accept']);

Route::post('/rejecttest',[Auth::class,'reject']);



