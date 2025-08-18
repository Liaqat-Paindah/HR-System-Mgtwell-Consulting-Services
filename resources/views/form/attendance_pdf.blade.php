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
                    <h3 class="page-title">Attendance Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendance Details</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <div class="col-sm-12">
                        @foreach ($attendances as $attendance)
                        <a href="{{ url('attendance_export/'.$attendance->rec_id)}}" target="_blank" class="btn btn-outline-success btn-sm" rel="noopener noreferrer"> <i class="fa fa-print"></i> Print PDF</a>
                        @endforeach
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
                        <label class="focus-label">Date</label>
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
                                <th>Time-In</th>
                                <th>Time-Out</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th class="text-right no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="{{ url('employee/attendance_details/'.$attendance->rec_id) }}" class="avatar"><img
                                                alt="" src="{{ URL::to('/assets/images/'. $attendance->profile) }}"></a>
                                        <a href="{{ url('employee/attendance_details/'.$attendance->rec_id) }}">{{ $attendance->name
                                            }}<span>{{ $attendance->position }}</span></a>
                                    </h2>
                                </td>
                                <td>{{ $attendance->rec_id }}</td>
                                <td>{{ \Carbon\Carbon::parse($attendance->clock_in_time)->timezone('Asia/Kabul')->format('h:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($attendance->clock_out_time)->timezone('Asia/Kabul')->format('h:i A') }}</td>

                                <td>{{ $attendance->date }}</td>
                                <td>{{ $attendance->months }}</td>
                                <td>{{ \Carbon\Carbon::create()->parse($attendance->created_at)->format('Y') }}</td>

                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="{{ url('all/employee/view/edit/'.$attendance->rec_id) }}"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="{{url('all/employee/delete/'.$attendance->rec_id)}}"
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
@section('script')
<script>

    // select auto id and email
    $('#name').on('change', function () {
        $('#employee_id').val($(this).find(':selected').data('employee_id'));
        $('#email').val($(this).find(':selected').data('email'));
    });
</script>
@endsection
@endsection
