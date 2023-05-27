<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseClass;
use App\Models\User;

class JoinClassController extends Controller
{
	public function addStudentToClass(Request $request)
	{
		$courseclass = CourseClass::find($request->input('course_class_id'));
		$user = User::find($request->input('student_user_id'));

		$courseclass->user()->attach($user->id);

		return response()->json([
			'success' => true,
			'message' => 'User added to Class',
		]);
	}
}
