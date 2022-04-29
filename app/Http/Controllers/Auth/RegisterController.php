<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\StudentDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
            return route( 'home' );
        } else {
            return route( 'login' );
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        dd($data);
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2,
            'status' => 1
        ]);

        $student_details = StudentDetail::create([
            'state_id' => $data['state_id'],
            'course_id' => $data['course_id'],
            'county_id' => $data['county_id'],
            'case_number' => $data['case_number'],
            'citation_number' => $data['citation_number'],
            'citation_due_date' => $data['citation_due_date'],
            'citation_court_due_date' => $data['citation_court_due_date'],
            'course_completion_certificate_price' => $data['course_completion_certificate_price'],
            
            'payment_type' => $data['payment_type'],
            'bank_name' => $data['bank_name'],
            'bank_account_name' => $data['bank_account_name'],
            'bank_account_no' => $data['bank_account_no'],
            'bank_account_routing_no' => $data['bank_account_routing_no'],
            'bank_account_type' => $data['bank_account_type'],
            'billing_zipcode' => $data['billing_zipcode'],
            'form_step' => '2',
            'course_step' => '1.1',
            'status' => '1',
        ]);

        return $user;
    }
}
