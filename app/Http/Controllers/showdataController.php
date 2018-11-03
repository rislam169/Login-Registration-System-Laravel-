<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class showdataController extends Controller
{
    public function index()
    {	
        if (Session::get('login')==true || Session::get('adminlogin')==true) {
            $data = Student::where('id', '!=' , Session::get('id'))->get();
            //$data = DB::table('students')->get();
            // return $data;
           return view('index', ['data' => $data]);
        }
        else{
             return redirect('login');
        }
		
    }

    public function show($id)
    {
        if (Session::get('login')==true || Session::get('adminlogin')==true) {
            $data = Student::where(['id' => $id] )->first();
             return view('profile',compact('data'));
        }
        else{
             return redirect('login');
        }


    }

    public function login()
    {
        if (Session::get('login')==true || Session::get('adminlogin')==true){
            return redirect('index');
        }
        return view('login');
    }

    public function adminLogin()
    {
        if (Session::get('login')==true || Session::get('adminlogin')==true){
            return redirect('index');
        }
    	return view('adminLogin');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
    	Session::flush();
        return redirect('login');
    }

    public function changepass()
    {
        return view('changepass');
    }

    public function addAdmin()
    {
        return view('addAdmin');
    }

}
