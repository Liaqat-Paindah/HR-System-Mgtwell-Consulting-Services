@extends('layouts.master')

@section('content')
{{-- message --}}
{!! Toastr::message() !!}
@include('sidebar.menubar')



<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid" id="app">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Payslip</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('form/salary/page') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payslip</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <div class="btn-group btn-group-sm">
                        @php
                        $thresholdDate = \Carbon\Carbon::now()->startOfMonth()->addDays(0);
                        $canPay = \Carbon\Carbon::now()->greaterThan($thresholdDate); // Check if today is after the 29th of the current month
                    @endphp

                    <button class="btn btn-white m-2">
                        @if ($canPay)
                            <a href="{{ url('form/salary/paid/'.$users->rec_id) }}">
                                <i class="fa fa-money fa-sm"></i> Payment
                            </a>
                        @else
                            <span style="color: gray; cursor: not-allowed;">
                                <i class="fa fa-money fa-sm"></i> Payment (Not Available)
                            </span>
                        @endif
                    </button>


                        <button class="btn btn-white m-2"><a href="{{ url('payslip_pdf/'.$users->rec_id)}}"
                                target="_blank"> <i class="fa fa-print fa-sm"></i> PDF</a></button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title"> Mgtwell Consulting Services
                            </h4>
                            <h5>Payslip for the month of {{ \Carbon\Carbon::now()->format('M') }} {{
                                \Carbon\Carbon::now()->year }} </h5>
                            <h6>For Office Only</h6>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <tr>
                                        <th>Employee Information</th>
                                    </tr>
                                </table>
                                <table class="table table-hover table-striped table-bordered">
                                    <tr>
                                        <th>S Number:</th>
                                        <td> {{ $users->id }} </td>
                                        <th>Budget Code:</th>
                                        <td>{{ $budgets->category }}</td>
                                    </tr>
                                    <tr>
                                        <th>Voucher Number:</th>
                                        <td> {{ $users->rec_id }}  </td>
                                        <th>Date:</th>
                                        <td id="now"> </td>
                                    </tr>
                                    <tr>
                                        <th>Full Name:</th>
                                        <td> {{ $users->name }}</td>
                                        <th>Position:</th>
                                        <td>{{ $users->position }}</td>
                                    </tr>
                                    <tr>
                                        <th>Father Name:</th>
                                        <td> {{ $users->fname}} </td>
                                        <th>Address:</th>
                                        <td> {{ $users->address }}</td>
                                    </tr>
                                    <tr>
                                        <th> Bank Account #:</th>
                                        <td> {{ $users->account_number }}</td>
                                        <th>Department</th>
                                        <td> Finance</td>
                                    </tr>
                                    <tr>
                                        <th> Duty Station:</th>
                                        <td> {{ $users->work_station }}</td>
                                        <th>Project:</th>
                                        <td> {{ $users->project }}</td>
                                    </tr>
                                    <tr>
                                        <th> Month Days:</th>
                                        <td> {{$daysInMonth}} </td>
                                        <th>Present Days:</th>
                                        <td> {{ $Present_days}}</td>
                                    </tr>
                                    <tr>
                                        <th>Absent Days:</th>
                                        <td> {{$Absent_days}}</td>
                                        <th>Paid and Leave Accepted Days:</th>
                                        <td> {{ $Present_days+$leaves24 }} </td>
                                    </tr>
                                    <tr>
                                        <th>Contracted Salary:</th>
                                        <td> {{$users->net_salary}}</td>
                                        <th>Tax:</th>
                                        <td> {{ $users->tax}} </td>
                                    </tr>
                                    <tr>
                                        <th>Gross Salary:</th>
                                        <td> {{$users->gross_salary}}</td>
                                        <th>Net Amount:</th>
                                        <td> {{ $Net_Amount}} </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <h5>Finance Manager Signature</h5>
                                    <hr>
                                    <h6>Ahmad Noorani </h6>
                                </div>
                                <div class="col-md-6">
                                    <img src="" alt="">
                                </div>
                                <div class="col-md-3">
                                    <h5>Employee Signature</h5>
                                    <hr>
                                    <h6>{{$users->name}} </h6>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <script>
        function Paid_Date() {
            var days = new Date();
            document.getElementById('now').innerHTML = days;

        }

    </script>
    <!-- /Page Wrapper -->
    @endsection
