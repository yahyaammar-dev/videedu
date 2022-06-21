<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Auth;


Route::post('studentsignup', [Auth::class,'register']);
Route::get('studentsignup', [Auth::class,'registerview']);

