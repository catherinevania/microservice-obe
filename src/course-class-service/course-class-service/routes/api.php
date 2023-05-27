<?php

use App\Http\Controllers\JoinClassController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth:sanctum']], function () {
	Route::apiResource('users', UserController::class);
});

Route::apiResource('courses', CourseController::class);
Route::apiResource('course-classes', CourseClassController::class);
