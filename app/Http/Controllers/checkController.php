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

   public function checkmailforupdate(Request $request)
   {
		$email = $request->email;
		$id = $request->id;

		// $checkmail = Student::where(['email' => $email])->first();
		// $checkmail = Student::where(['id' '!=' $id])->first();

		$checkmail = Student::where('email', '=', $email)
			    ->where('id', '!=', $id)->first();

		if ($checkmail) {
   			return response()->json(['success'=>false]);
   		}else{
   			return response()->json(['success'=>true]);
   		}

   }

}
