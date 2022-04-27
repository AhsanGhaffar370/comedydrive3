<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\LoginController;

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



Auth::routes();
// Route::get('/', function () { return view('welcome');

// });

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/home', [FrontController::class, 'index'])->name('home');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/course', [FrontController::class, 'course'])->name('course');
Route::get('/get_enrolled', [FrontController::class, 'get_enrolled'])->name('get_enrolled');
Route::get('/question', [FrontController::class, 'question'])->name('question');

Route::group(['middleware'=>['student_auth']],function(){
    Route::get('/student-courses', [FrontController::class, 'student_courses'])->name('student-courses');
});

Route::group(['middleware'=>['admin_auth'], 'prefix' => 'admin', 'as' => 'admin.'],function(){

    // Dashboar
    Route::get('/dashboard', [DashboardController::class, 'listing'] )->name('dashboard');

    // students
    Route::get('/students/view', [StudentController::class, 'view'] )->name('students.view');

    Route::get('/students/add', [StudentController::class, 'view_add'] )->name('students.add');
    Route::post('/students/add_req', [StudentController::class, 'add_req'] )->name('students.add_req');
    
    Route::get('/students/update/{id}',[StudentController::class, 'view_update'])->name('students.update.id');
    Route::post('/students/update_req',[StudentController::class, 'update_req'])->name('students.update_req');

    Route::get('/students/delete/{id}',[StudentController::class, 'delete'])->name('students.delete.id');

    Route::get('/students/update-status/{id}/{status}',[StudentController::class, 'update_status'])->name('students.update_status.id.status');

});

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');