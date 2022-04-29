@extends('admin/layout/layout')

@section('page_title','| Home')

@section('content')

<div class="page_height pb-5">
    <div class="page-title">
        <div class="title_left">
            <h1>Cargo <span class="size16">Type</span></h1>
			<a href={{route('admin.students.list')}} class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
				<i class="fas fa-eye"></i><br>
				<span class="size13">View All</span> 
			</a>
			{{--  <a href={{route('admin.students.add')}} class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
				<i class="fas fa-plus"></i><br>
				<span class="size13">Add New</span> 
			</a>  --}}
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            @if(session('msg')!="")
            <div class="alert alert-{{session('alert')}} alert-dismissible fade show text-center d-block" role="alert">
                {{session('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box ">
                                <table id="cargo_table" class="table table-striped table-bordered" >
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <!-- <th>Brocker Info</th> -->
                                            <th style="padding: 0px 40px 10px 40px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->studentDetail->firstname ?? ''}}</td>
                                            <td>{{$row->email}}</td>
                                            
                                            <!-- <td>
												<strong>N:</strong>{{-- $row->brocker_name --}}<br>
												<strong>T:</strong>{{-- $row->brocker_phone --}}<br>
												<strong>E:</strong>{{-- $row->brocker_email --}}
											</td> -->
                                            
                                            <td>
                                                @if($row->status =="1")
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">In-Active</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="btn-group" style="display: -webkit-box;">
                                                    <a href={{route('admin.students.view', ['id' => $row->id])}}
                                                        class="btn btn-success btn-sm ml-2 pt-1 pb-1 rounded"><i class="fas fa-solid fa-eye"></i></a>
                                                    {{--  <a href={{route('admin.students.update', ['id' => $row->id])}}
                                                        class="btn btn-warning btn-sm ml-2 pt-1 pb-1 rounded"><i class="fas fa-solid fa-user-edit"></i></a>
                                                    <a href={{route('admin.students.delete', ['id' => $row->id])}}
                                                        class="btn btn-danger btn-sm ml-2 pt-1 pb-1 rounded"><i class="fas fa-solid fa-trash"></i></a>  --}}
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection