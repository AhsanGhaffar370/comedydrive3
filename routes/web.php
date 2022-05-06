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

// Route::group(['middleware'=>['login_control']],function(){
    Route::get('/home', [FrontController::class, 'home'])->name('home1');
// });

Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/re-enter-course', [FrontController::class, 'course'])->name('course');
Route::get('/get-enrolled', [FrontController::class, 'get_enrolled'])->name('get_enrolled');
Route::get('/get-enrolled-step2', [FrontController::class, 'get_enrolled_step2'])->name('get_enrolled_step2');
Route::post('/get-enrolled-step2-store', [FrontController::class, 'store_get_enrolled_step2'])->name('store_get_enrolled_step2');
Route::get('/get-enrolled-step2-edit/{id}', [FrontController::class, 'edit_get_enrolled_step2'])->name('edit_get_enrolled_step2');
Route::post('/get-enrolled-step2-update', [FrontController::class, 'update_get_enrolled_step2'])->name('update_get_enrolled_step2');
Route::get('/get-enrolled-step2_1', [FrontController::class, 'get_enrolled_step2_1'])->name('get_enrolled_step2_1');
Route::post('/get-enrolled-step2_1-store', [FrontController::class, 'store_get_enrolled_step2_1'])->name('store_get_enrolled_step2_1');
Route::get('/get-enrolled-step3', [FrontController::class, 'get_enrolled_step3'])->name('get_enrolled_step3');
Route::post('/get-enrolled-step3-store', [FrontController::class, 'store_get_enrolled_step3'])->name('store_get_enrolled_step3');
Route::get('/get-enrolled-courses', [FrontController::class, 'get_enrolled_courses'])->name('get_enrolled_courses');
Route::get('/question', [FrontController::class, 'question'])->name('question');
// Route::get('/register', [FrontController::class, 'register'])->name('register');
Route::get('/course_county', [FrontController::class, 'courseCounty']);
Route::get('/thank-you', [FrontController::class, 'thank_you']);

Route::group(['middleware'=>['student_auth']],function(){
    Route::get('/student-courses', [FrontController::class, 'student_courses'])->name('student-courses');
});

Route::group(['middleware'=>['admin_auth'], 'prefix' => 'admin', 'as' => 'admin.'],function(){

    // Dashboar
    Route::get('/dashboard', [DashboardController::class, 'listing'] )->name('dashboard');

    // students
    Route::get('/students/list', [StudentController::class, 'list'] )->name('students.list');
    Route::get('/students/view/{id}', [StudentController::class, 'view'] )->name('students.view');

    Route::get('/students/add', [StudentController::class, 'view_add'] )->name('students.add');
    Route::post('/students/add_req', [StudentController::class, 'add_req'] )->name('students.add_req');
    
    Route::get('/students/update/{id}',[StudentController::class, 'view_update'])->name('students.update');
    Route::post('/students/update_req',[StudentController::class, 'update_req'])->name('students.update_req');

    Route::get('/students/delete/{id}',[StudentController::class, 'delete'])->name('students.delete');

    Route::get('/students/update-status/{id}/{status}',[StudentController::class, 'update_status'])->name('students.update_status.id.status');

});

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');