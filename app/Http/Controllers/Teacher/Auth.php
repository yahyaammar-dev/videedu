<?php

namespace App\Http\Controllers\Teacher;

use Inertia\Inertia;
use App\Models\degree;
use App\Models\teacher;
use App\Models\classroom;
use App\Models\questions;
use App\Models\lecture;
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

        echo "hourlyrate";

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
        $teacher->hourlyrate = $req->hourlyrate;
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

            $classrooms = teacher::find($result["id"])->classroom;

            return Inertia::render('Teacher/Teacheraccount',[
                "teacher" => $result,
                "questions" => $questions,
                "classrooms" => $classrooms
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


    public function submitdegree(REQUEST $req){
        $req->validate([
            'title'=> 'required|min:3',
            'degree'=> 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);
 
        $degree = new degree;
        $degree->teacher_id = $req->id;
        $degree->title = $req->title;        
        if ($req->hasFile('degree')) {
            $degreefile = $req->file('degree')->store('/teacher/account', 'public');
        }
        $degree->url = $degreefile;        
        $degree->save();
    }


    public function getClass(Request $req){
         $result = classroom::where('id',$req->id)->first();
         return Inertia::render('Teacher/Viewclassroom',[
            'classroom'=>$result
         ]); 
    }

    public function createClass(Request $req){

        $req->validate([
            'name' => 'required|min:3',
            'bio' => 'required|min:5',
            'classesperweek'=> 'required|min:1',
            'monthlyfees'=> 'required|min:1',
            'totalclasses' => 'required|min:1',
            'image'=> 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);


        if ($req->hasFile('image')) {
            $image = $req->file('image')->store('/teacher/account', 'public');
        }

        $classroom = new classroom;
        $classroom->name = $req->name;
        $classroom->bio = $req->bio;
        $classroom->classesperweek = $req->classesperweek;
        $classroom->monthlyfees = $req->monthlyfees;
        $classroom->totalclasses = $req->totalclasses;
        $classroom->image = $image;
        $classroom->teacher_id = $req->teacher_id;
        $classroom->status = "pending";
        $classroom->save();

 //     return redirect()->route('teachersignup')->with("successMessage","Congratulations, You are registered!!!");
    }


    public function postMeetingLink(REQUEST $req){
         $result = classroom::where('id',$req->id)->first();
         $result->link = $req->meetingLink;
         $result->save();
    }

    public function postLecture(REQUEST $req){
        $lecture = new lecture;
        $lecture->title =  $req->title;
        $lecture->classroom_id  = $req->id;
        if ($req->hasFile('lecturefile')) {
            $filePath = $req->file('lecturefile')->store('/teacher/account', 'public');
        }
        $lecture->file= $filePath;
        $lecture->save();
    }

}