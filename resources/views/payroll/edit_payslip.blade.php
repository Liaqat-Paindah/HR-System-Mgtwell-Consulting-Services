
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
                        <h3 class="page-title">Employee View</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee View Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">PaySlip edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('all/employee/update') }}" method="POST">
                                @csrf
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ $employees[0]->id }}">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> S-Number</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $employees[0]->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Budget Code:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="fname" value="{{ $employees[0]->fname }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Voucher Number:</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $employees[0]->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Date</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control datetimepicker" id="birth_date" name="birth_date" value="{{ $employees[0]->birth_date }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Full Name:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="nid" name="nid" value="{{ $employees[0]->nid }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Father Name:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="blood_group" name="blood_group" value="{{ $employees[0]->blood_group }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Address:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="tin" name="tin" value="{{ $employees[0]->tin }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Position:</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{ $employees[0]->phone }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Bank Account </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $employees[0]->account_number }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Department:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="position" name="position" value="{{ $employees[0]->position }}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Gender</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="gender" name="gender">
                                            <option value="{{ $employees[0]->gender }}" {{ ( $employees[0]->gender == $employees[0]->gender) ? 'selected' : '' }}>{{ $employees[0]->gender }} </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Employee ID</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $employees[0]->employee_id }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Project:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="project:" name="project:" value="{{ $employees[0]->project }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Address:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="address:" name="address:" value="{{ $employees[0]->address }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Work Station:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="work_station:" name="work_station:" value="{{ $employees[0]->work_station }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Category:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="category:" name="category:" value="{{ $employees[0]->category }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">step:</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="step:" name="step:" value="{{ $employees[0]->step }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Gross Salary:</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="gross_salary:" name="gross_salary:" value="{{ $employees[0]->gross_salary }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Tax:</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="tax:" name="tax:" value="{{ $employees[0]->tax }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Net Salary:</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="net_salary:" name="net_salary:" value="{{ $employees[0]->net_salary }}">
                                    </div>
                                </div>

                                

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        
    </div>
    <!-- /Page Wrapper -->
    @section('script')
    <script>
        $("input:checkbox").on('click', function()
        {
            var $box = $(this);
            if ($box.is(":checked"))
            {
                var group = "input:checkbox[class='" + $box.attr("class") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);
            }
            else
            {
                $box.prop("checked", false);
            }
        });
    </script>
    @endsection

@endsection
