<?php

use App\Http\Controllers\api\LeaveController;
use App\Http\Controllers\api\LectureController;
use App\Http\Controllers\api\TaskController;
use App\Http\Controllers\CoursePostController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\LeaveApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/lecture')->as('lecture.')->controller(LectureController::class)->group(function(){
    Route::post('/store-lecture','store')->name('store');
});
Route::get('/fetch-student-this-task/{task_id}',[TaskController::class,'fetch_student_this_task'])->name('user.fetch_student_this_task');
Route::get('/fetch-task/{trainer_id}/{class_id}',[TaskController::class,'fetch_task'])->name('user.fetch_task');
Route::get('/fetch-all-task/{trainer_id}/{class_id}',[TaskController::class,'fetch_all_task'])->name('user.fetch_all_task');

Route::as('task.')->controller(TaskController::class)->group(function(){
    Route::post('/store-task','store')->name('store');
    Route::post('/store-attempt-task','store_attempt')->name('store_attempt');
    Route::get('/fetch-attempt/{student_id}/{task_attempt_id}','fetch_attempt')->name('fetch_attempt');
});

Route::get('/fetch-course-by-class',[UserController::class,'fetch_course_by_class'])->name('fetch_course.by_class');

Route::get('/fetch-lecture/{trainer_id}/{class_id}',[UserController::class,'fetch_lecture'])->name('user.fetch_lecture');

Route::as('home.')->controller(HomeController::class)->group(function(){
    Route::get('/fetch-trainer',[HomeController::class,'fetch_trainer'])->name('fetch_trainer');
    Route::get('/fetch-course',[HomeController::class,'fetch_course'])->name('fetch_course');
});

Route::post('/store-dashboard-post/{admin_id}',[DashboardPostController::class,'store'])->name('admin.store_post_dashboard');

Route::get('/fetch-dashoard-post',[DashboardPostController::class,'fetch'])->name('admin.fetch_dashboard_post');

Route::post('/store-leave-application',[LeaveController::class,'store'])->name('user.apply_leave');

Route::post('/store-post-course',[CoursePostController::class,'store'])->name('user.store_post_course');

Route::get('/fetch-post-course/{course_id}/{class_id}',[CoursePostController::class,'index'])->name('user.fetch_course_post');

Route::post('/response-submit-task',[TaskController::class,'response_submit_task'])->name('user.response_submit_task');