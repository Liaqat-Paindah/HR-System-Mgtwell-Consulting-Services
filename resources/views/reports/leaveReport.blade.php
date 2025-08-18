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
                    <h3 class="page-title">Leave Report</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leave Report</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                            <a href="{{url('/home')}}" class="btn btn-warning btn-sm px-3"><i
                            class="fa fa-file-excel-o"></i> Export</a>

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
                                <th>Profile</th>
                                <th>Employee ID</th>
                                <th>Sick Leave</th>
                                <th>Annual Leave</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="{{ url('leave/report_details/'.$result->employee_id) }}" class="avatar"><img
                                                alt="" src="{{ URL::to('/assets/images/'. $result->profile) }}"></a>
                                        <a href="{{ url('leave/report_details/'.$result->employee_id) }}">{{ $result->name
                                            }}<span>{{ $result->position }}</span></a>
                                    </h2>
                                <td>{{$result->employee_id}}</td>
                                <td>
                                    <a href="{{ url('leave/report_details/'.$result->employee_id) }}" class="btn btn-success btn-sm"><i
                                        class="fa fa-user-circle-o"></i> Sick Leave</a>
                                </td>
                                <td>
                                <a href="{{ url('leave/report_annuals/'.$result->employee_id) }}" class="btn btn-success btn-sm"><i
                                    class="fa fa-file-pdf-o"></i> Annual Leave</a>
                                <td class="text-right">Actions</td>

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

@endsection
