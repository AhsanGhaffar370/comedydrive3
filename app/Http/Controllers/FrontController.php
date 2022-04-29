<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Course;
use App\Models\County;
use App\Models\User;
use App\Models\StudentDetail;
use App\Models\Role;
use App\Models\CourseDetail;
use DB;
use Illuminate\Support\Facades\Validator;
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

    public function home()
    {
        if(auth()->user()->role_id == '1'){
            return redirect()->route('admin.dashboard');
        }else if(auth()->user()->role_id == '2'){
            return redirect()->route('get_enrolled');
        }else{
            return redirect()->route('/');
        }
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
        $states = State::all();
        $courses = Course::all();
        $counties = County::all();

        if (Auth::check() && Auth::user()->role_id == 2) {
            $student_detail = StudentDetail::where('user_id', Auth::user()->id)->first();

            if (isset($student_detail) && $student_detail->form_step == '2') {
                // dd('1');
                return redirect()->route('get_enrolled_step2');
                // return view('front/get_enrolled_step2', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
            elseif (isset($student_detail) && $student_detail->form_step == '3') {
                // dd('12');
                return redirect()->route('get_enrolled_step3');
                // return view('front/get_enrolled_step3', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
            elseif (isset($student_detail) && $student_detail->form_step == '4') {
                // dd('13');
                return redirect()->route('get_enrolled_courses');
                // return view('front/get_enrolled_courses');
            }
            else {
                return view('front/get_enrolled', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
        } else {
            return view('front/get_enrolled', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
        }
    }
    
    public function get_enrolled_step2()
    {
        $states = State::all();
        $courses = Course::all();
        $counties = County::all();

        if (Auth::check() && Auth::user()->role_id == 2) {
            $student_detail = StudentDetail::where('user_id', Auth::user()->id)->first();

            if (isset($student_detail) && $student_detail->form_step == '2') {
                // return redirect()->route('get_enrolled_step2');
                return view('front/get_enrolled_step2', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
            elseif (isset($student_detail) && $student_detail->form_step == '3') {
                return redirect()->route('get_enrolled_step3');
                // return view('front/get_enrolled_step3', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
            elseif (isset($student_detail) && $student_detail->form_step == '4') {
                return redirect()->route('get_enrolled_courses');
                // return view('front/get_enrolled_courses');
            }
            else {
                return view('front/get_enrolled', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
        } else {
            return view('front/get_enrolled', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
        }
    }
    
    protected function store_get_enrolled_step2(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'telephone' => 'required',
            'gender' => 'required',
            'drivers_license_state_id' => 'required',
            'drivers_license_number' => 'required',
            'license_plate_number' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        try {
            // Rollback if data not inserted properly
            DB::transaction(function () use ($request, $user) {

                $student_detail = StudentDetail::where('user_id', $user->id)->update([
                    'firstname' => $request->get('firstname'),
                    'middlename' => $request->get('middlename'),
                    'lastname' => $request->get('lastname'),
                    'telephone' => $request->get('telephone'),
                    'gender' => $request->get('gender'),
                    'dob' => $request->get('dob') ?? null,
                    'drivers_license_state_id' => $request->get('drivers_license_state_id'),
                    'drivers_license_number' => $request->get('drivers_license_number'),
                    'license_plate_number' => $request->get('license_plate_number'),
                    'form_step' => 3
                ]);
            });
        } catch(\Exception $e) {
            return redirect()->route('get_enrolled_step2')
                            ->with('error','Something went wrong');
        }
    
        return redirect()->route('get_enrolled_step3')
                        ->with('success','Data has been created successfully.');
    }
    
    public function get_enrolled_step3()
    {
        $states = State::all();
        $courses = Course::all();
        $counties = County::all();

        if (Auth::check() && Auth::user()->role_id == 2) {
            $student_detail = StudentDetail::where('user_id', Auth::user()->id)->first();

            if (isset($student_detail) && $student_detail->form_step == '2') {
                return redirect()->route('get_enrolled_step2');
                // return view('front/get_enrolled_step2', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
            elseif (isset($student_detail) && $student_detail->form_step == '3') {
                // return redirect()->route('get_enrolled_step3');
                return view('front/get_enrolled_step3', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
            elseif (isset($student_detail) && $student_detail->form_step == '4') {
                return redirect()->route('get_enrolled_courses');
                // return view('front/get_enrolled_courses');
            }
            else {
                return view('front/get_enrolled', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
        } else {
            return view('front/get_enrolled', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
        }
    }
    
    protected function store_get_enrolled_step3(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'certificate_mailing_address' => 'required',
            'certificate_mailing_city' => 'required',
            'certificate_mailing_state_id' => 'required',
            'certificate_mailing_zipcode' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        try {
            // Rollback if data not inserted properly
            DB::transaction(function () use ($request, $user) {
                $student_detail = StudentDetail::where('user_id', $user->id)->update([
                    'certificate_mailing_address' => $request->get('certificate_mailing_address'),
                    'certificate_mailing_city' => $request->get('certificate_mailing_city'),
                    'certificate_mailing_state_id' => $request->get('certificate_mailing_state_id'),
                    'certificate_mailing_zipcode' => $request->get('certificate_mailing_zipcode'),
                    'form_step' => 4
                ]);
                // dd()
            });
        } catch(\Exception $e) {
            return redirect()->route('get_enrolled_step3')
                            ->with('error','Something went wrong');
        }
    
        return redirect()->route('get_enrolled_courses')
                        ->with('success','Data has been created successfully.');
    }

    public function get_enrolled_courses() 
    {
        $states = State::all();
        $courses = Course::all();
        $counties = County::all();

        if (Auth::check() && Auth::user()->role_id == 2) {
            $student_detail = StudentDetail::where('user_id', Auth::user()->id)->first();

            if (isset($student_detail) && $student_detail->form_step == '2') {
                return redirect()->route('get_enrolled_step2');
                // return view('front/get_enrolled_step2', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
            elseif (isset($student_detail) && $student_detail->form_step == '3') {
                return redirect()->route('get_enrolled_step3');
                // return view('front/get_enrolled_step3', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
            elseif (isset($student_detail) && $student_detail->form_step == '4') {
                // return redirect()->route('get_enrolled_courses');
                return view('front/get_enrolled_courses');
            }
            else {
                return view('front/get_enrolled', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
            }
        } else {
            return view('front/get_enrolled', ['states' => $states, 'courses' => $courses, 'counties' => $counties]);
        }
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
