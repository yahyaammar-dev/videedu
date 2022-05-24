<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('General/Home');
});


require('teacher.php');
require('admin.php');