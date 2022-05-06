<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'course_status' => 1])) {
    //         if (Auth::user()->role_id == 1) {
    //             return route( 'admin.dashboard' );
    //         }
    //         else if (Auth::user()->role_id == 2) {
    //             $student_detail = StudentDetail::where('user_id', Auth::user()->id)->first();
    //             Session::put('user_state_id', ($student_detail->state_id ?? ''));
                
    //             return route( 'get_enrolled_step2' );
    //         } else {
    //             return route( 'course' );
    //         }
    //     }
    //     return $this->error('Credentials does not matched!', 401);
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
   
    public function redirectTo()
    {
        if (Auth::user()->role_id == 1) {
            return route( 'admin.dashboard' );
        }
        else if (Auth::user()->role_id == 2) {
            $student_detail = StudentDetail::where('user_id', Auth::user()->id)->first();
            Session::put('user_state_id', ($student_detail->state_id ?? ''));
            
            return route( 'get_enrolled_step2' );
        } else {
            return route( 'course' );
        }
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        Session::forget('user_state_id');
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
