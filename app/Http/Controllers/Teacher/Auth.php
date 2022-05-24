<?php

namespace App\Http\Controllers\Teacher;

use Inertia\Inertia;
use App\Models\teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Auth extends Controller
{
    public function Signup(Request $req){

        $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:5|unique:teacher,email',
            'password'=> 'required|min:8',
            'phone'=> 'required|min:11',
            'image'=> 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'idfront'=> 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'idback'=> 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);


        if ($req->hasFile('image')) {
            $image = $req->file('image')->store('/teacher/account', 'public');
        }

        if ($req->hasFile('idfront')) {
            $idfront = $req->file('idfront')->store('/teacher/account', 'public');
        }

        if ($req->hasFile('idback')) {
            $idback = $req->file('idback')->store('/teacher/account', 'public');
        }


        $teacher = new teacher;
        $teacher->name = $req->name;
        $teacher->email = $req->email;
        $teacher->password = $req->password;
        $teacher->phone = $req->phone;
        $teacher->image = $image;
        $teacher->idfront = $idfront;
        $teacher->idback = $idback;
        $teacher->save();

        return redirect()->route('teachersignup')->with("successMessage","Congratulations, You are registered!!!");
    }



    public function Login(REQUEST $req){

        $req->validate([
            'email' => 'required|min:5',
            'password'=> 'required|min:8',
        ]);
        
        $result = teacher::where('email',$req->email)
            ->where('password',$req->password)  
            ->get();

        if(count($result)>0){
            return Inertia::render('Teacher/Teacheraccount');            
        }
    }
}
