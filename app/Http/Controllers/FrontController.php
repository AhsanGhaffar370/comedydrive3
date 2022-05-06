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
use Session;
use Response;

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
        if(Auth::check() && Auth::user()->role_id == '1'){
            return redirect()->route('admin.dashboard');
        }else if(Auth::check() && Auth::user()->role_id == '2'){
            return redirect()->route('get_enrolled');
        }else{
            return view('front/home');
        }
    }

    public function home()
    {
        if(Auth::check() && Auth::user()->role_id == '1'){
            return redirect()->route('admin.dashboard');
        }else if(Auth::check() && Auth::user()->role_id == '2'){
            return redirect()->route('get_enrolled');
        }else{
            return view('front/home');
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
    
    public function thank_you()
    {
        return view('front/thank_you');
    }
    
    public function get_enrolled()
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
            if (isset($student_detail) && $student_detail->form_step == '2.1') {
                // return redirect()->route('get_enrolled_step2');
                return redirect()->route('get_enrolled_step2_1');
            }
            elseif (isset($student_detail) && $student_detail->form_step == '3') {
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
            if (isset($student_detail) && $student_detail->form_step == '2.1') {
                // return redirect()->route('get_enrolled_step2');
                return redirect()->route('get_enrolled_step2_1');
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
        $validator = Validator::make($request->all(), [
            'session_state' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'telephone' => 'required',
            'gender' => 'required',
            'drivers_license_state_id' => 'required',
            'drivers_license_number' => 'required | same:confirm_drivers_license_number',
            'license_plate_number' => 'required_if:session_state,3 | same:confirm_license_plate_number',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        // try {
            // Rollback if data not inserted properly
            DB::transaction(function () use ($request, $user) {
                $form_step = '3';
                if ($request->get('session_state') == '3') {
                    $form_step = '2.1';
                }
                $student_detail = StudentDetail::where('user_id', $user->id)->update([
                    'firstname' => $request->get('firstname'),
                    'middlename' => $request->get('middlename'),
                    'lastname' => $request->get('lastname'),
                    'telephone' => $request->get('telephone'),
                    'gender' => $request->get('gender'),
                    'dob' => $request->get('dob') ?? null,
                    'drivers_license_state_id' => $request->get('drivers_license_state_id'),
                    'drivers_license_number' => $request->get('drivers_license_number'),
                    'license_plate_number' => $request->get('license_plate_number') ?? null,
                    'non_texas_license_name' => $request->get('non_texas_license_name') ?? null,
                    'non_texas_license_address' => $request->get('non_texas_license_address') ?? null,
                    'non_texas_license_city' => $request->get('non_texas_license_city') ?? null,
                    'non_texas_license_zipcode' => $request->get('non_texas_license_zipcode') ?? null,
                    'non_texas_license_dob' => $request->get('non_texas_license_dob') ?? null,
                    'non_registered_vehicle_lastname' => $request->get('non_registered_vehicle_lastname') ?? null,
                    'non_registered_vehicle_address' => $request->get('non_registered_vehicle_address') ?? null,
                    'non_registered_vehicle_city' => $request->get('non_registered_vehicle_city') ?? null,
                    'non_registered_vehicle_state' => $request->get('non_registered_vehicle_state') ?? null,
                    'non_registered_vehicle_zipcode' => $request->get('non_registered_vehicle_zipcode') ?? null,
                    'non_registered_vehicle_year' => $request->get('non_registered_vehicle_year') ?? null,
                    'non_registered_vehicle_make' => $request->get('non_registered_vehicle_make') ?? null,
                    'non_registered_vehicle_expire_year' => $request->get('non_registered_vehicle_expire_year') ?? null,
                    'non_registered_vehicle_model' => $request->get('non_registered_vehicle_model') ?? null,
                    'form_step' => $form_step
                ]);
                // dd($student_detail, $form_step);
            });
        // } catch(\Exception $e) {
        //     return redirect()->route('get_enrolled_step2')
        //                     ->with('error','Something went wrong');
        // }
        if ($request->get('session_state') == '3') {
            return redirect()->route('get_enrolled_step2_1')
            ->with('success','Data has been saved successfully.');
        }
        else {
            return redirect()->route('get_enrolled_step3')
            ->with('success','Data has been saved successfully.');
        }
    }
    
    protected function update_get_enrolled_step2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'session_state' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'telephone' => 'required',
            'gender' => 'required',
            'drivers_license_state_id' => 'required',
            'drivers_license_number' => 'required | same:confirm_drivers_license_number',
            'license_plate_number' => 'required_if:session_state,3 | same:confirm_license_plate_number',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        // try {
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
                    'license_plate_number' => $request->get('license_plate_number') ?? null,
                    'non_texas_license_name' => $request->get('non_texas_license_name') ?? null,
                    'non_texas_license_address' => $request->get('non_texas_license_address') ?? null,
                    'non_texas_license_city' => $request->get('non_texas_license_city') ?? null,
                    'non_texas_license_zipcode' => $request->get('non_texas_license_zipcode') ?? null,
                    'non_texas_license_dob' => $request->get('non_texas_license_dob') ?? null,
                    'non_registered_vehicle_lastname' => $request->get('non_registered_vehicle_lastname') ?? null,
                    'non_registered_vehicle_address' => $request->get('non_registered_vehicle_address') ?? null,
                    'non_registered_vehicle_city' => $request->get('non_registered_vehicle_city') ?? null,
                    'non_registered_vehicle_state' => $request->get('non_registered_vehicle_state') ?? null,
                    'non_registered_vehicle_zipcode' => $request->get('non_registered_vehicle_zipcode') ?? null,
                    'non_registered_vehicle_year' => $request->get('non_registered_vehicle_year') ?? null,
                    'non_registered_vehicle_make' => $request->get('non_registered_vehicle_make') ?? null,
                    'non_registered_vehicle_expire_year' => $request->get('non_registered_vehicle_expire_year') ?? null,
                    'non_registered_vehicle_model' => $request->get('non_registered_vehicle_model') ?? null
                ]);
            });
        // } catch(\Exception $e) {
        //     return redirect()->route('get_enrolled_step2')
        //                     ->with('error','Something went wrong');
        // }
        return redirect()->route('get_enrolled_courses')
            ->with('success','Data has been updated successfully.');
    }

    public function edit_get_enrolled_step2($id)
    {
        $states = State::all();

        if (Auth::check() && Auth::user()->role_id == 2) {
            $student_detail = StudentDetail::where('user_id', $id)->first();

            return view('front/edit_get_enrolled_step2', ['student_detail' => $student_detail, 'states' => $states]);
        } else {
            return redirect()->route('home');
        }
    }
    
    public function get_enrolled_step2_1()
    {
        $states = State::all();
        $courses = Course::all();
        $counties = County::all();

        if (Auth::check() && Auth::user()->role_id == 2) {
            $student_detail = StudentDetail::where('user_id', Auth::user()->id)->first();

            if (isset($student_detail) && $student_detail->form_step == '2') {
                // return redirect()->route('get_enrolled_step2');
                return redirect()->route('get_enrolled_step2');
            }
            if (isset($student_detail) && $student_detail->form_step == '2.1') {
                // return redirect()->route('get_enrolled_step2_1');
                return view('front/get_enrolled_step2_1');
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

    protected function store_get_enrolled_step2_1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ssn_no' => 'required',
            'dps_audit_no' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        try {
            // Rollback if data not inserted properly
            DB::transaction(function () use ($request, $user) {
                $student_detail = StudentDetail::where('user_id', $user->id)->update([
                    'ssn_no' => $request->get('ssn_no'),
                    'dps_audit_no' => $request->get('dps_audit_no'),
                    'form_step' => '3'
                ]);
            });
        } catch(\Exception $e) {
            return redirect()->route('get_enrolled_step2_1')
                            ->with('error','Something went wrong');
        }
    
        return redirect()->route('get_enrolled_step3')
                        ->with('success','Data has been saved successfully.');
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
            if (isset($student_detail) && $student_detail->form_step == '2.1') {
                // return redirect()->route('get_enrolled_step2');
                return redirect()->route('get_enrolled_step2_1');
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
                        ->with('success','Data has been saved successfully.');
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
            if (isset($student_detail) && $student_detail->form_step == '2.1') {
                // return redirect()->route('get_enrolled_step2');
                return redirect()->route('get_enrolled_step2_1');
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

    function courseCounty(Request $request) {
        $data = [];
        if ($request->has('state_id')) {
            // $course_ids = Course::where('state_id', $request->state_id)->pluck('id')->all();
            $data['course_id'] = Course::where('state_id', $request->get('state_id'))->get();
            $data['county_id'] = County::where('state_id', $request->get('state_id'))->get();
        }
        // if ($request->has('course_id')) {
        //     $data['county_id'] = County::where('course_id', $request->get('course_id'))->get();
        // }
        return Response::json(['data' => $data], 200);
    }
}
