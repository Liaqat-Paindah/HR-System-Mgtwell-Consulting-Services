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
                    <h3 class="page-title"> Annual Leave</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('form/leaves/report')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"> Annual Leave</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                            <a href="{{url('all/employee/export')}}" class="btn add-btn btn-sm  m-2"><i
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
                                <th>Annual Leave</th>
                                <th>Annual Leave Requested</th>
                                <th>Annual Leave Balance</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($annuals as $annual)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="{{ url('leave/report_details/'.$annual->employee_id) }}" class="avatar"><img
                                                alt="" src="{{ URL::to('/assets/images/'. $annual->profile) }}"></a>
                                        <a href="{{ url('leave/report_details/'.$annual->employee_id) }}">{{ $annual->name
                                            }}<span>{{ $annual->position }}</span></a>
                                    </h2>
                                <td>{{$annual->employee_id}}</td>
                                <td>18 days</td>
                                <td>{{$annual->total_leave_days}} days</td>
                                <td>{{$Annual_leave}} days</td>
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
