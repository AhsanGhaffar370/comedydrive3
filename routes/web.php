<?php

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



Auth::routes();
// Route::get('/', function () { return view('welcome');

// });


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/contact', function () {
    return view('front/contact');
}
)->name('contact');

Route::get('/course', function () {
        return view('front/course');
    }
)->name('course');

Route::get('/get_enrolled', function () {
        return view('front/get_enrolled');
    }
)->name('get_enrolled');

Route::get('/question', function () {
        return view('front/question');
    }
)->name('question');
