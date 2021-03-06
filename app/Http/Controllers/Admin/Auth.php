<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\admin;
use App\Models\student;
use App\Models\teacher;
use App\Models\classroom;
use App\Models\questions;
use App\Models\studentfee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Auth extends Controller
{
    public function Signup(Request $req){
        $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:5|unique:admin,email',
            'password'=> 'required|min:8',
            'phone'=> 'required|min:11',
            'image'=> 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'idfront'=> 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'idback'=> 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);
        if ($req->hasFile('image')) {
            $image = $req->file('image')->store('/admin/account', 'public');
        }
        if ($req->hasFile('idfront')) {
            $idfront = $req->file('idfront')->store('/admin/account', 'public');
        }
        if ($req->hasFile('idback')) {
            $idback = $req->file('idback')->store('/admin/account', 'public');
        }
        $admin = new admin;
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->password = $req->password;
        $admin->phone = $req->phone;
        $admin->image = $image;
        $admin->idfront = $idfront;
        $admin->idback = $idback;
        $admin->save();
        return redirect()->route('adminsignup')->with("successMessage","Congratulations, You are registered!!!");
    }

    public function Login(REQUEST $req){
        
        $req->validate([
            'email' => 'required|min:5',
            'password'=> 'required|min:8',
        ]);
        
        $result = admin::where('email',$req->email)
            ->where('password',$req->password)  
            ->get()->first();
    
             //i am harcoding the $result["id"] with 1, will be replaced later
        $students = admin::find(1)->students;
        if(count($students)>0){
            $fees = [];
            foreach($students as $std){
                $data = student::find($std["id"])->fees;
                array_push($fees,$data);
            }
        }
        
        if(!$fees){
            $fees[0]=0;
        }

        if(isset($result)){
            //i am harcoding the $result["id"] with 1, will be replaced later
            $teachers = admin::find(1)->teachers;
            $pendingfees = studentfee::where('status','pending')->get();
        return Inertia::render('Admin/Adminaccount',[
                'fee' => $fees[0],
                'teachers' => $teachers,
                'admin' => $result
            ]);            
        }
    
    }

    public function viewteacher(REQUEST $req){
        $admin = admin::find($req->adminid);
        $teacher = teacher::find($req->id);
        $questions = teacher::find($req->id)->question;
        $degrees = teacher::find($req->id)->degree;
        $classrooms = teacher::find($req->id)->classroom;
        return Inertia::render('Admin/ViewTeacher',[
            'teacher' => $teacher,
            'admin'=> $admin,
            'questions' => $questions,
            'degrees' => $degrees,
            'classrooms' => $classrooms
        ]);
    }

    public function verifyteacher(REQUEST $req){
        $teacher = teacher::find($req->id);
        $teacher->idstatus = true;
        $teacher->save();        
    }

    public function addQuestion(REQUEST $req){
        $question = new questions; 
        $question->admin_id = $req->admin; 
        $question->teacher_id = $req->teacher;      
        $question->question = $req->question;
        $question->save();  
        $teacher = teacher::find($req->teacher);
        $teacher->teststatus = "false";  
        $teacher->save();  
    }

    public function accept(REQUEST $req){
        $teacher = teacher::find($req->id);
        $teacher->teststatus = "accepted";
        $teacher->save();
    }

   public function reject(REQUEST $req){
        $teacher = teacher::find($req->id);
        $teacher->teststatus = "rejected";
        $teacher->save();
    }

    public function setinterviewdate(REQUEST $req){
        $teacher = teacher::find($req->id);
        $teacher->interviewdate = $req->interviewdate;
        $teacher->save();
    }

    public function acceptinterview(REQUEST $req){
        $teacher = teacher::find($req->id);
        $teacher->interviewstatus = $req->interviewsat;
        $teacher->save();
    }

    public function rejectinterview(REQUEST $req){
        $teacher = teacher::find($req->id);
        $teacher->interviewstatus = $req->interviewsat;
        $teacher->save();
    }

    public function interviewlink(REQUEST $req){
        $teacher = teacher::find($req->id);
        $teacher->interviewlink = $req->interviewlink;
        $teacher->save();
    }

    public function acceptdegrees(REQUEST $req){
        $teacher = teacher::find($req->id);
        $teacher->degreestatus = "accepted";
        $teacher->save();
    }

    public function rejectdegrees(REQUEST $req){
        $teacher = teacher::find($req->id);
        $teacher->degreestatus = "rejected";
        $degrees = teacher::find($req->id)->degree;
        $degrees->each->delete();
        $teacher->save();
    }


    public function approveclass(REQUEST $req){
        $classroom = classroom::find($req->c_id);
        $classroom->status = 'accepted';
        $classroom->save();
    }

    public function deleteclass(REQUEST $req){
        $classroom = classroom::find($req->c_id)->delete();
    }

    public function approveFees(REQUEST $req){
        $std = studentfee::where('id', $req->id)->first();
        $std->status = "approved";
        $std->save();
    }

}