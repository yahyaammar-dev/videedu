<?php

namespace App\Http\Controllers\student;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class auth extends Controller
{
    public function register(REQUEST $req){

        $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:5|unique:student,email',
            'password'=> 'required|min:8',
            'adminid'=> 'required'
        ]);

        $student = new student;
        $student->name = $req->name;
        $student->email = $req->email;
        $student->password = $req->password;
        $student->studentid = $req->adminid;
        $student->save();

        return redirect()->route('studentsignup')->with("successMessage","Congratulations, You are registered!!!");

    }
}
