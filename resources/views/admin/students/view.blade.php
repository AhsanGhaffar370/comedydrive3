@extends('admin/layout/layout')

@section('page_title','| Home')

@section('content')


<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Student</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />

                    <form method="post" id="cargo_form" action={{route('admin.students.update_req')}} class="form-horizontal form-label-left"
                        enctype="multipart/form-data">
                        <!-- <form method="post" action="{{url('/admin/post/add_post')}}" class="form-horizontal form-label-left"> -->
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}" />
                        <input type="hidden" name="status" value="{{$user->status}}" />

                        <div class="form-group col-sm-4">
                            <label for="">Cargo Name</label>
                            <input 
                                type="text" 
                                value="{{$user->name}}" 
                                required name="name"
                                class="form-control">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection