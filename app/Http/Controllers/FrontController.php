<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front/home');
    }

    public function contact()
    {
        return view('front/contact');
    }
    
    public function course()
    {
        return view('front/course');
    }
    
    public function get_enrolled()
    {
        return view('front/get_enrolled');
    }
    
    public function question()
    {
        return view('front/question');
    }
    
    public function student_courses()
    {
        if (auth::check() && auth()->user()->role_id == 2) {
            return view('front/student_courses');
        }else{
            abort(403);
        }
    }
}
