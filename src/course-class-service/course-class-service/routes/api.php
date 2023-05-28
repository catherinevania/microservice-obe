<?php

use App\Http\Controllers\JoinClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseClassController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::group(['middleware' => ['auth:sanctum']], function () {
// 	Route::apiResource('users', UserController::class);
// });

Route::apiResource('course', CourseController::class);
Route::apiResource('course-class', CourseClassController::class);

// Route::post('/course-class/{id}/add-student', 'CourseClassController@addStudentToClass');
// Route::get('/course-class/{id}/view-students', 'CourseClassController@viewStudentInClass');

Route::post('/course-class/{id}/add-student', [CourseClassController::class, 'addStudentToClass']);
Route::get('/course-class/{id}/view-students', [CourseClassController::class, 'viewStudentInClass']);

