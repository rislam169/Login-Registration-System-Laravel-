<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function logs(Request $loginfo){
    	//echo "You are in log in page";
    	$email = $loginfo->email;
    	$password = $loginfo->password;
    	$data = Student::where(['email' => $email, 'password' => $password] )->first();
    	
    	if($data){
    		Session::put('login',true);
    		Session::put('id',$data->id);
    		Session::put('username',$data->username);

    		 return redirect('profile/'.$data->id);
    	}else{
    		 return redirect('login')->with('danger-message', 'Email or Password mismatch');
    	}
    }

    public function adminlogs(Request $adminLoginfo)
    {
    	//echo "You are in admin login page";
    	$email = $adminLoginfo->email;
    	$password = $adminLoginfo->password;
    	$data = Admin::where(['email' => $email, 'password' => $password] )->first();
    	
    	print_r($data);
    	if($data){
    		Session::put('adminlogin',true);
    		Session::put('adminid',$data->id);
    		Session::put('username',$data->username);

    		return redirect('index');
    	}else{
    		 return redirect('adminLogin')->with('danger-message', 'Email or Password mismatch');
    	}
    }
}
