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
use DB;

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
    
    // public function redirectTo()
    // {
    //     if (Auth::user()->role_id == 1) {
    //         return route( 'admin.dashboard' );
    //     }
    //     else if (Auth::user()->role_id == 2) {
    //         return route( 'get_enrolled_step2' );
    //     } else {
    //         return route( 'login' );
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'state_id' => ['required'],
            'course_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'citation_number' => ['required_if:course_id,1,2'],
            'citation_due_date' => ['required_if:course_id,1,2'],
            'citation_court_due_date' => ['required_if:course_id,1,2'],
            'case_number' => ['required_if:course_id,3'],
            'payment_type' => ['required'],
            'card_type' => ['required_if:payment_type,card'],
            'card_number' => ['required_if:payment_type,card'],
            'card_name' => ['required_if:payment_type,card'],
            'card_code' => ['required_if:payment_type,card'],
            'card_expiry_month' => ['required_if:payment_type,card'],
            'card_expiry_year' => ['required_if:payment_type,card'],
            'bank_name' => ['required_if:payment_type,check'],
            'bank_account_name' => ['required_if:payment_type,check'],
            'bank_checking_account_no' => ['required_if:payment_type,check'],
            'bank_account_routing_no' => ['required_if:payment_type,check'],
            'bank_account_type' => ['required_if:payment_type,check'],
            'billing_zipcode' => ['required'],
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
        
        try{
            $user = null;
            $student_details = null;

            // Rollback if data not inserted properly
            DB::transaction(function () use ($data, &$user, &$student_details) {
                $bank_name = null;
                $bank_account_name = null;
                $bank_checking_account_no = null;
                $bank_account_routing_no = null;
                $bank_account_type = null;

                $status = 1;
                if ($data['payment_type'] == 'card') {
                    $card_type = $data['card_type'];
                    $card_number = $data['card_number'];
                    $card_name = $data['card_name'];
                    $card_code = $data['card_code'];
                    $card_expiry_month = $data['card_expiry_month'];
                    $card_expiry_year = $data['card_expiry_year'];

                    $status = 1;
                } 
                elseif ($data['payment_type'] == 'check') {
                    $bank_name = $data['bank_name'];
                    $bank_account_name = $data['bank_account_name'];
                    $bank_checking_account_no = $data['bank_checking_account_no'];
                    $bank_account_routing_no = $data['bank_account_routing_no'];
                    $bank_account_type = $data['bank_account_type'];

                }

                $citation_number = null;
                $citation_due_date = null;
                $citation_court_due_date = null;
                if ($data['state_id'] == '1' && $data['course_id'] == '1') {
                    $citation_number = $data['citation_number'];
                    $citation_due_date = $data['citation_due_date'];
                    $citation_court_due_date = $data['citation_court_due_date'];
                }

                $case_number = null;
                if ($data['state_id'] == '1' && $data['course_id'] == '2') {
                    $case_number = $data['case_number'];
                }

                $course_completion_certificate_price = null;
                if (isset($data['course_completion_certificate_price'])) {
                    $course_completion_certificate_price = $data['course_completion_certificate_price'];
                }
                
                $user = User::create([
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role_id' => 2,
                    'status' => $status
                ]);

                $student_details = StudentDetail::create([
                    'user_id' => $user->id,
                    'state_id' => $data['state_id'],
                    'course_id' => $data['course_id'],
                    'county_id' => $data['county_id'],
                    'case_number' => $case_number,
                    'citation_number' => $citation_number,
                    'citation_due_date' => $citation_due_date,
                    'citation_court_due_date' => $citation_court_due_date,
                    'course_completion_certificate_price' => $course_completion_certificate_price,
                    
                    'payment_type' => $data['payment_type'],
                    'bank_name' => $bank_name,
                    'bank_account_name' => $bank_account_name,
                    'bank_checking_account_no' => $bank_checking_account_no,
                    'bank_account_routing_no' => $bank_account_routing_no,
                    'bank_account_type' => $bank_account_type,
        
                    'billing_zipcode' => $data['billing_zipcode'],
                    'form_step' => '2',
                    'course_step' => '1.1',
                    'status' => '1',
                ]);
            });
        } catch(\Exception $e) {
            return redirect()->route('get_enrolled')
                            ->with('error','Something went wrong');
        }
        
        return $user;
        // if ($user && $student_details) {
        // } else {
        //     return redirect()->route('get_enrolled_step2')->with('error','Something went wrong');
        // }
    }
}
