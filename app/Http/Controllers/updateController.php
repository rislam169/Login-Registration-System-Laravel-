<?php

namespace App\Http\Controllers;

use App\Student;
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

		return redirect('index')->with('success-message', 'Congratulation!! Data updated!');

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
   		print_r($data);

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
}
