<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Student;
use App\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function regs(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
    		'username' => 'required',
		    'email' => 'required|unique:students|max:255',
		    'password' => 'required|max:6|min:4',
		]);

    	$student = new Student;
        $student->name 		= $request->name;
        $student->username  = $request->username;   
        $student->email     = $request->email;   
        $student->password  = $request->password;   
        $student->save();

        $student_info = new StudentInfo;
        $student_info->student_id       = $student->id;
        $student_info->save();

        return redirect('login')->with('success-message', 'Congratulation!! You are registered!');
    }

    public function adminregs(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:admins|max:191',
            'password' => 'required|max:6|min:4',
        ]);

        $admin = new Admin;
        
        $admin->username  = $request->username;   
        $admin->email     = $request->email;   
        $admin->password  = $request->password;   
       
        $admin->save();
        return redirect('index')->with('success-message', 'Congratulation!! Admin registered!');
    }

    public function removeAccount()
    {
        $id = Session::get('adminid');
        Admin::where('id', $id)->delete();
        Session::flush();
        return redirect('login')->with('success-message', 'Admin Removed Successfully');
    }
}
