<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoChatController;

Route::get('/', function () {
    return Inertia::render('General/Home');
});


require('teacher.php');
require('admin.php');
require('student.php');
