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
        return view('admin/students/list',['data'=>$data,'count'=>1]);
    }

    function view($id){
        $user=User::with(['studentDetail'])->find($id);
        return view('admin/students/view',['user'=>$user,]);
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
