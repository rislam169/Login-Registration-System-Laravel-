<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class checkController extends Controller
{
   public function checkmail(Request $request)
   {

   		$email = $request->email;
   		$check = Student::where(['email' => $email] )->first();
   		if ($check) {
   			return response()->json(['success'=>false]);
   		}else{
   			return response()->json(['success'=>true]);
   		}
  
   }
}
