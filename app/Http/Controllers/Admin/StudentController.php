<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\StudentDetail;
use App\Models\Course;
use App\Models\RegisteredStudent;
use App\Models\Role;

class StudentController extends Controller
{
    function list(){
        $data = User::with(['studentDetail'])->get();//present
        // $count=1;
        // dd($data);

        return view('admin/students/list',['data'=>$data,'count'=>1]);
    }

    function view_add(){
        $ss_setup_cargo_type= ss_setup_cargo_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();
        $ss_setup_unit= ss_setup_unit::active()->get();

        return view('admin/students/add',['cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port,
                                        'unit'=>$ss_setup_unit]
                                    );
    }

    function add_req(Request $req){

        $student=new ss_cargo;

        $student->cargo_name=$req->cargo_name;
        $student->cargo_type_id=$req->cargo_type_id;
        $student->loading_region_id=$req->loading_region_id;
        $student->loading_country_id=$req->loading_country_id;
        $student->loading_port_id_1=$req->loading_port_id_1;
        $student->loading_port_id_2=$req->loading_port_id_2;
        $student->discharge_region_id=$req->discharge_region_id;
        $student->discharge_country_id=$req->discharge_country_id;
        $student->discharge_port_id_1=$req->discharge_port_id_1;
        $student->discharge_port_id_2=$req->discharge_port_id_2;
        $student->laycan_date_from=$req->laycan_date_from;
        $student->laycan_date_to=$req->laycan_date_to;
        $student->quantity=$req->quantity;
        $student->unit_id=$req->unit_id;
        $student->max_loa=$req->max_loa;
        $student->max_draft=$req->max_draft;
        $student->max_height=$req->max_height;
        $student->commision=$req->commision;
        $student->combinable=$req->combinable;
        $student->over_age=$req->over_age;
        $student->hazmat=$req->hazmat;
        $student->loading_discharge_rates=$req->loading_discharge_rates;
        $student->loading_discharge_unit_id=$req->loading_discharge_unit_id;
        $student->loading_equipment_req=$req->loading_equipment_req;
        $student->gear_lifting_capacity=$req->gear_lifting_capacity;

        // $student->loading_discharge_equipment_req=$req->loading_discharge_equipment_req;
        foreach ($req->loading_discharge_equipment_req as $selectedOption)
            $student->loading_discharge_equipment_req .= $selectedOption.", ";

        $student->loading_discharge_equipment_req=rtrim($student->loading_discharge_equipment_req, ", ");

        $student->additional_info=$req->additional_info;
        $student->is_active="1";
        $student->created_at=date('Y-m-d H:i:s');
        $student->created_by="1";
        $student->modified_at=date('Y-m-d H:i:s');
        $student->modified_by="0";
        // $student->created_at=date('Y-m-d H:i:sa');

        // $student->title=$req->brocker_name;
        // $student->title=$req->broacker_contact;
        // $student->title=$req->broacker_email;


        $student->save();

        $req->session()->flash('msg','Student Added');
        $req->session()->flash('alert','success');

        return redirect()->route('admin.students.view');
    }

    function view($id){
        $user=User::with(['studentDetail'])->find($id);
        // dd($user->studentDetail);
        return view('admin/students/view',['user'=>$user,]);
    }

    function view_update($id){
        // $res=User::where('cargo_id',$id)->first();
        // $res=DB::table('ss_cargo')->where('cargo_id',$id)->get();

        $res=User::find($id);
        $ss_setup_cargo_type= ss_setup_cargo_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();
        $ss_setup_unit= ss_setup_unit::active()->get();

        // $eq_req=explode(",", $res[0]->loading_discharge_equipment_req);
        // echo $res[0]->cargo_name;

        return view('admin/students/update',['res'=>$res,
                                        // 'eq_req'=>$eq_req,
                                        'cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port,
                                        'unit'=>$ss_setup_unit]
                                    );
    }


    function update_req(Request $req){

        // $student = DB::table('ss_cargo')
        //       ->where('cargo_id', $req->cargo_id)
        //       ->update(['cargo_name' => $req->cargo_name]); 

        // $student=User::where('cargo_id', $req->cargo_id)->first();
        $student=User::find($req->cargo_id);

        $student->cargo_name=$req->cargo_name;
        $student->cargo_type_id=$req->cargo_type_id;
        $student->loading_region_id=$req->loading_region_id;
        $student->loading_country_id=$req->loading_country_id;
        $student->loading_port_id_1=$req->loading_port_id_1;
        $student->loading_port_id_2=$req->loading_port_id_2;
        $student->discharge_region_id=$req->discharge_region_id;
        $student->discharge_country_id=$req->discharge_country_id;
        $student->discharge_port_id_1=$req->discharge_port_id_1;
        $student->discharge_port_id_2=$req->discharge_port_id_2;
        $student->laycan_date_from=$req->laycan_date_from;
        $student->laycan_date_to=$req->laycan_date_to;
        $student->quantity=$req->quantity;
        $student->unit_id=$req->unit_id;
        $student->max_loa=$req->max_loa;
        $student->max_draft=$req->max_draft;
        $student->max_height=$req->max_height;
        $student->commision=$req->commision;
        $student->combinable=$req->combinable;
        $student->over_age=$req->over_age;
        $student->hazmat=$req->hazmat;
        $student->loading_discharge_rates=$req->loading_discharge_rates;
        $student->loading_discharge_unit_id=$req->loading_discharge_unit_id;
        $student->loading_equipment_req=$req->loading_equipment_req;
        $student->gear_lifting_capacity=$req->gear_lifting_capacity;

        $student->loading_discharge_equipment_req="";
        foreach ($req->loading_discharge_equipment_req as $selectedOption)
            $student->loading_discharge_equipment_req .= $selectedOption.", ";
        $student->loading_discharge_equipment_req=rtrim($student->loading_discharge_equipment_req, ", ");

        $student->additional_info=$req->additional_info;
        $student->is_active=$req->is_active;
        $student->modified_at=date('Y-m-d H:i:s');
        // $student->title=$req->brocker_name;
        // $student->title=$req->broacker_contact;
        // $student->title=$req->broacker_email;

        $student->save();


        $req->session()->flash('msg','Student Details Updated');
        $req->session()->flash('alert','warning');

        return redirect()->route('admin.students.view');
    }


    function update_status($id, $status){

        $student= User::find($id);
        $student->status=$status;
        $student->save();

        session()->flash('msg','Student Status Updated');
        session()->flash('alert','warning');

        return redirect()->route('admin.students.view');
    }

    function delete($id){
        $student=User::find($id);

        $student->delete();

        session()->flash('msg','Student Deleted');
        session()->flash('alert','danger');
        return redirect()->route('admin.students.view');
    }

}
