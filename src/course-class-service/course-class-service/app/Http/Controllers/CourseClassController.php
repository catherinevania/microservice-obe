<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseClassStoreRequest;
use App\Http\Requests\CourseClassUpdateRequest;
use App\Http\Resources\CourseClassResource;
use App\Models\CourseClass;
use App\Models\User;

class CourseClassController extends Controller
{
	public function index()
	{
		//code here
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store()
	{
		//code here
	}

	/**
	 * Display the specified resource.
	 */
	public function show()
	{
		//code here
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update()
	{
		//code here
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy()
	{
		//code here
	}

	/**
	 * add students to a class
	 */
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
