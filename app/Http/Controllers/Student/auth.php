<?php

namespace App\Http\Controllers\student;

use Inertia\Inertia;
use App\Models\Student;
use App\Models\classroom;
use App\Models\studentfee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
        $student->admin_id = $req->adminid;
        $student->save();

        return redirect()->route('studentsignup')->with("successMessage","Congratulations, You are registered!!!");
    }

    public function registerview(){
        return Inertia::render('Student/Register');
    }


    public function login(REQUEST $req){
        
        $req->validate([
            'email' => 'required|min:3',
            'password'=> 'required|min:8',
        ]);

        $result = student::where('email',$req->email)
        ->where('password',$req->password)  
        ->get()->first();

        if(isset($result)){
            $classrooms = classroom::all();

            $joinedclassrooms = studentfee::where('student_id',$result->id)->where('status','approved')->get('id');

            $stdclassrooms = [];
            if(isset($joinedclassrooms)){
                foreach($joinedclassrooms as $classroomid){
                    $data = classroom::find($classroomid);
                    array_push($stdclassrooms, $data);
                }
            }

            $req->session()->put('student', $result);

            return Inertia::render('Student/Account',[
                'classrooms' => $classrooms,
                'joinedclassroom' => $stdclassrooms[0]
            ]);            
        }
    }

    public function loginstudentview(){
        return Inertia::render('Student/Login');
    }

    public function viewclassroom(REQUEST $req){
        $result = classroom::where('id',$req->id)->first();
        $teachere = classroom::find($req->id)->teacher;
        return Inertia::render('Student/ViewClassroom',[
            'classs' => $result,
            'teacher' => $teachere,
            'student' =>  $req->session()->pull('student')
        ]);
    }

    public function submitpayment(REQUEST $req){
        return Inertia::render('Student/JoinClass',[
            'classid' => $req->classid,
            'studentid' => $req->studentid,
            'teacherid' => $req->teacherid
        ]);
    }

    public function submitpaymentstdfees(REQUEST $req){
            $admin = student::find(1)->admin;
            
            if ($req->hasFile('screenshot')) {
                $image = $req->file('screenshot')->store('/student/fees', 'public');
            }

            $studentfee = new studentfee;
            $studentfee->student_id = $req->studentid;
            $studentfee->classroom_id = $req->classid;
            $studentfee->admin_id = $admin->id;
            $studentfee->amount = $req->amount;
            $studentfee->screenshot = $image;
            $studentfee->status = "pending";
            $studentfee->save();
 

            return Inertia::render('Student/JoinClass',[
                "successMessage"=>"Congratulations, Your fees has been submitted!!!"
            ]);
          
 
        }

}