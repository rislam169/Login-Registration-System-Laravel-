<?php

namespace App\Http\Controllers;

use App\EducationInfo;
use App\Student;
use App\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class updateController extends Controller
{
   public function update(Request $request)
   {
   		$id = $request->id;
   		$request->validate([
    		'name' => 'required',
    		'username' => 'required',
		]);

		Student::where('id', $id)->update([
			'name' => $request->name,
			'username' => $request->username,
			'email' => $request->email,
		]);
		StudentInfo::where('student_id', $id)->update([
			'father_name' => $request->fname,
			'mother_name' => $request->mname,
			'address' => $request->address,
			'mobile' => $request->mobile,
		]);
		if(Session::get('adminlogin') == true){
			return redirect('index')->with('success-message', 'Congratulation!! Data updated!');
		}else{
			return redirect('profile/'.Session::get('id'))->with('success-message', 'Congratulation!! Data updated!');
		}

   }

   public function updatepass(Request $request)
   {
   		$id = Session::get('id');
   		$request->validate([
    		'newpass' => 'required|max:6|min:4',
		]);

		$oldpass = $request->oldpass;
		$newpass = $request->newpass;

   		$data = Student::where(['id' => $id] )->first();
   		//print_r($data);

   		if ($oldpass == $data->password) {
   			Student::where('id', $id)->update([
				'password' => $newpass,
			]);

			return redirect('index')->with('success-message', 'Congratulation!! Password updated!');
   		}else{
   			return redirect('changepass')->with('danger-message', 'Old password not match!');
   		}	
   }

   public function delprofile($id)
   {
   		Student::where('id', $id)->delete();
   		return redirect('index')->with('success-message', 'Data deleted Successfully');
   }

   public function saveeducation(Request $request)
   {
        $data = EducationInfo::where(['degree' => $request->degree, 'student_id' => $request->student_id] )->first();
        if ($data == NULL) {
          $educationInfo = new EducationInfo;
          $educationInfo->student_id    = $request->student_id;
          $educationInfo->degree  = $request->degree;   
          $educationInfo->degree_name     = $request->degreename;   
          $educationInfo->institute  = $request->institute;   
          $educationInfo->board  = $request->board;   
          $educationInfo->passing_year  = $request->passyear;   
          $educationInfo->duration  = $request->duration;   
          $educationInfo->gpa  = $request->gpa;   
          $educationInfo->save();
          return response()->json(['success'=>true]);
        }else{
          return response()->json(['success'=>false]);
        }

       
   }

   public function deleducation(Request $request)
   {
      $id = $request->id;
      if($id){
         EducationInfo::where('id', $id)->delete();
        return response()->json(['success'=>true]);
      }else{
        return response()->json(['success'=>false ]);
      }
     
   }
}
