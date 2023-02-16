<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\api\LeaveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('MLMS')->controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home.index');
    Route::get('/trainer-list','trainer_list')->name('home.trainer_list');
    Route::get('/course-list','course_list')->name('home.course_list');
});

Route::controller(UserController::class)->prefix('user')->as('user.')->middleware('auth')->group(function(){
    Route::get('/dashboard','index')->name('dashboard');
    Route::get('/my-class','my_class')->name('class');
    Route::get('/enter-course/{trainer_id}/{class_id}','enter_course')->name('enter_course');
    Route::get('/my-detail','my_detail')->name('my_detail');
});
Route::get('/fetch-time-table/{trainer_id}',[UserController::class,'fetch_timetable'])->name('fetch_timetable');

Route::get('/leave-index',[LeaveController::class,'index'])->middleware('auth')->name('leave.index');

Route::controller(AuthController::class)->group(function(){
    Route::post('/login','login')->name('login');
    Route::post('/logout','logout')->name('logout');
});

Route::prefix('admin')->as('admin.')->controller(AdminController::class)->group(function(){
    Route::get('list-user-index','list_user_index')->name('list_user_index');
    Route::get('list-user-fetch','list_user_fetch')->name('list_user_fetch');
    Route::get('list-student-index','list_student_index')->name('list_student_index');
    Route::get('list-student-fetch','list_student_fetch')->name('list_student_fetch');
    Route::get('list-leave-index','list_leave_index')->name('list_leave_index');
    Route::get('list-leave-fetch','list_leave_fetch')->name('list_leave_fetch');
    Route::get('/view-leave-detail/{leave_id}','view_leave_detail')->name('view_leave_detail');
    Route::post('/response-leave','response_leave')->name('response_leave');
    Route::post('/store-student','store_student')->name('store_student');
    Route::get('/view-certificate','view_certificate')->name('view_certificate');
    Route::get('/generate-certificate','generate_certificate')->name('generate_certificate');
});

Route::get('/user-calendar',[CalendarController::class,'index'])->name('user.calendar_index');






Route::get('/conteng',[CalendarController::class,'index']);