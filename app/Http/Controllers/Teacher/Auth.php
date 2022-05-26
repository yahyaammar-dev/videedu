<?php

namespace App\Http\Controllers\Teacher;

use Inertia\Inertia;
use App\Models\teacher;
use App\Models\questions;
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
            'bio' => 'required|min:50|max:80',
            'hourlyrate' => 'required|min:1',
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

        if(!isset($req->adminid)){
            $adminid = 1;
        }else{
            $adminid = $req->adminid;
        }

        $teacher = new teacher;
        $teacher->name = $req->name;
        $teacher->email = $req->email;
        $teacher->password = $req->password;
        $teacher->phone = $req->phone;
        $teacher->admin_id = $adminid;
        $teacher->bio = $req->bio;
        $teacher->hourlyrate = $hourlyrate;
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
            ->first();

        if(isset($result)){

            $questions = teacher::find($result["id"])->question;

            return Inertia::render('Teacher/Teacheraccount',[
                "teacher" => $result,
                "questions" => $questions
            ]);            
        }
    }




    public function submittest(REQUEST $req){
        $ques = questions::where('teacher_id',$req->id)->get();
        $answers = $req->answers;
        for($i=0; $i<count($ques); $i++){
            $ques[$i]["answer"]= $answers[$i];
            $ques[$i]["status"] = true;
            $ques[$i]->save();
        }
        // return Inertia::render('Teacher/Teacheraccount');
    }
}
