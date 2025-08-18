@extends('layouts.master')
@section('content')
@include('sidebar.menubar')




<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{$departmentValue}} Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('departmentlist') }}">Department</a></li>
                        <li class="breadcrumb-item active">Department Details</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <div class="view-icons">
                        <a href="{{ route('all/employee/card') }}" class="grid-view btn btn-link active"><i
                                class="fa fa-th"></i></a>
                        <a href="{{ route('all/employee/list') }}" class="list-view btn btn-link"><i
                                class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- /Page Header -->

        <!-- Search Filter -->
        <form action="{{ route('all/employee/list/search') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control  required floating" name="employee_id">
                        <label class="focus-label">Employee ID</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control  required floating">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control  required floating">
                        <label class="focus-label">Position</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button type="sumit" class="btn btn-success btn-block"> Search </button>
                </div>
            </div>
        </form>
        <!-- Search Filter -->
        {{-- message --}}
        {!! Toastr::message() !!}

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Employee ID</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th class="text-nowrap">Join Date</th>
                                <th>Position</th>
                                <th class="text-right no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $items)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="{{ url('employee/profile/'.$items->id) }}" class="avatar"><img
                                                alt="" src="{{ URL::to('/assets/images/'. $items->profile) }}"></a>
                                        <a href="{{ url('employee/profile/'.$items->id) }}">{{ $items->name
                                            }}<span>{{ $items->position }}</span></a>
                                    </h2>
                                </td>
                                <td>{{ $items->employee_id }}</td>
                                <td>{{ $items->email }}</td>
                                <td>{{ $items->phone }}</td>
                                <td>{{ $items->created_at }}</td>
                                <td>{{ $items->position }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="{{ url('all/employee/view/edit/'.$items->id) }}"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="{{url('all/employee/delete/'.$items->id)}}"
                                                onclick="return confirm('Are you sure to want to delete it?')"><i
                                                    class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
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
    <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->

@endsection