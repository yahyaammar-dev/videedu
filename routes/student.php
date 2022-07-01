<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Auth;


Route::post('registerstudent', [Auth::class,'register'])->name('registerstudent');
Route::get('studentsignup', [Auth::class,'registerview'])->name('studentsignup');

Route::post('loginstudent', [Auth::class,'login'])->name('loginstudent');
Route::get('loginstudentview', [Auth::class,'loginstudentview'])->name('loginstudentview');

Route::get('viewclassroom/{id}', [Auth::class,'viewclassroom']);

Route::get('joinclass/{classid}/{teacherid}/{studentid}', [Auth::class, 'submitpayment']);

Route::post('submitpaymentstdfees', [Auth::class, 'submitpaymentstdfees'])->name('joinclass');