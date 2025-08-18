@extends('layouts.master')
{{--
@section('menu')
@extends('sidebar.dashboard')
@endsection --}}
@section('content')
    @include('sidebar.menubar')



    @foreach($user as $users)
        <div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('all/employee/list') }}">Employees</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
                <!-- /Page Header -->
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#"><img alt="" src="{{ URL::to('/assets/images/' . $users->profile) }}"
                                                    alt="{{ $users->name }}"></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name mt-2 mb-0">{{ $users->name }} </h3>
                                                    <h6 class=" nid"> Tazkira || NID: {{ $users->nid }}</h6>
                                                    <p class="text-muted">Position: {{ $users->position }}</p>
                                                    <p class="text-muted">Employee ID: {{ $users->employee_id }}</p>
                                                    <div class="small doj text-muted">Date of Join : {{ $users->created_at }}
                                                    </div>
                                                    <a href="{{ url('employee_pdf/' . $users->employee_id) }}"
                                                        class="btn btn-outline-success btn-sm"> <i class="fa fa-print"></i>
                                                         </a>

                                                    <a href="{{ url('/assets/cv/' . $users->cv_attachment) }}"
                                                        class="btn btn-outline-success btn-sm" download>
                                                        <i class="fa fa-download"></i>  CV
                                                    </a>

                                                    <a href="{{ url('/assets/nid/' . $users->nid_attachment) }}"
                                                        class="btn btn-outline-success btn-sm" download>
                                                        <i class="fa fa-download"></i>  NID
                                                    </a>

                                                                                                        <a href="{{ url('/assets/document/' . $users->documents_attachments) }}"
                                                        class="btn btn-outline-success btn-sm" download>
                                                        <i class="fa fa-download"></i>  Document
                                                    </a>


                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <h3 class="card-title">Personal Information </h3>

                                                <table class="personal-info">
                                                    <tr>
                                                        <th class="dt-details">Phone Number:</th>
                                                        <td class="dt-contents">{{ $users->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="dt-details">Email:</th>
                                                        <td class="dt-contents">{{ $users->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="dt-details">birthDate:</th>
                                                        <td class="dt-contents">{{ $users->birth_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="dt-details">Gender:</th>
                                                        <td class="dt-contents">{{ $users->gender }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="dt-details">Blood Group:</th>
                                                        <td class="dt-contents">{{ $users->blood_group }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-content">
                    <!-- Profile Info Tab -->
                    <div id="emp_profile" class="pro-overview tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">General Information</h3>
                                        <table class="personal-info">
                                            <tr>
                                                <th class="dt-details">Account Number:</th>
                                                <td class="dt-contents">{{ $users->account_number }}</td>
                                            </tr>

                                            <tr>
                                                <th class="dt-details">Project:</th>
                                                <td class="dt-contents">{{ $users->project }}</td>
                                            </tr>



                                            <tr>
                                                <th class="dt-details">Work Station:</th>
                                                <td class="dt-contents">{{ $users->work_station }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Salary Infromation</h3>
                                        <table class="personal-info">
                                            <tr>
                                                <th class="dt-details">Gross Salary:</th>
                                                <td class="dt-contents">{{ $users->gross_salary }} Afghani</td>
                                            </tr>
                                            <tr>
                                                <th class="dt-details">Tax:</th>
                                                <td class="dt-contents">{{ $users->tax }} Afghani</td>
                                            </tr>
                                            <tr>
                                                <th class="dt-details">Net Salary:</th>
                                                <td class="dt-contents">{{ $users->net_salary }} Afghani</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Currect Address </h3>
                                        <table class="personal-info">
                                            <tr>
                                                <td class="">{{ $users->current_address }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title"> Permanent Address </h3>
                                        <table class="personal-info">
                                            <tr>
                                                <td class="">{{ $users->permanent_address }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /Profile Info Tab -->

                    <!-- Projects Tab -->
                    <div class="tab-pane fade" id="emp_projects">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"
                                                href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt=""
                                                            src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt=""
                                                            src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt=""
                                                            src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt=""
                                                            src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt=""
                                                            src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                                class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"
                                                href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt=""
                                                            src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt=""
                                                            src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt=""
                                                            src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt=""
                                                            src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt=""
                                                            src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                                class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"
                                                href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt=""
                                                            src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt=""
                                                            src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt=""
                                                            src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt=""
                                                            src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt=""
                                                            src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                                class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"
                                                href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt=""
                                                            src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt=""
                                                            src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt=""
                                                            src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt=""
                                                            src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt=""
                                                            src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                                class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Projects Tab -->

                    <!-- Bank Statutory Tab -->
                    <div class="tab-pane fade" id="bank_statutory">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"> Basic Salary Information</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Salary basis <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select salary basis type</option>
                                                    <option>Hourly</option>
                                                    <option>Daily</option>
                                                    <option>Weekly</option>
                                                    <option>Monthly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Salary amount <small class="text-muted">per
                                                        month</small></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Type your salary amount" value="0.00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Payment type</label>
                                                <select class="select">
                                                    <option>Select payment type</option>
                                                    <option>Bank transfer</option>
                                                    <option>Check</option>
                                                    <option>Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3 class="card-title"> PF Information</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">PF contribution</label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee PF rate</label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Additional rate <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select additional rate</option>
                                                    <option>0%</option>
                                                    <option>1%</option>
                                                    <option>2%</option>
                                                    <option>3%</option>
                                                    <option>4%</option>
                                                    <option>5%</option>
                                                    <option>6%</option>
                                                    <option>7%</option>
                                                    <option>8%</option>
                                                    <option>9%</option>
                                                    <option>10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Total rate</label>
                                                <input type="text" class="form-control" placeholder="N/A" value="11%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee PF rate</label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Additional rate <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select additional rate</option>
                                                    <option>0%</option>
                                                    <option>1%</option>
                                                    <option>2%</option>
                                                    <option>3%</option>
                                                    <option>4%</option>
                                                    <option>5%</option>
                                                    <option>6%</option>
                                                    <option>7%</option>
                                                    <option>8%</option>
                                                    <option>9%</option>
                                                    <option>10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Total rate</label>
                                                <input type="text" class="form-control" placeholder="N/A" value="11%">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <h3 class="card-title"> ESI Information</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">ESI contribution</label>
                                                <select class="select">
                                                    <option>Select ESI contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select ESI contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee ESI rate</label>
                                                <select class="select">
                                                    <option>Select ESI contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Additional rate <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select additional rate</option>
                                                    <option>0%</option>
                                                    <option>1%</option>
                                                    <option>2%</option>
                                                    <option>3%</option>
                                                    <option>4%</option>
                                                    <option>5%</option>
                                                    <option>6%</option>
                                                    <option>7%</option>
                                                    <option>8%</option>
                                                    <option>9%</option>
                                                    <option>10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Total rate</label>
                                                <input type="text" class="form-control" placeholder="N/A" value="11%">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Bank Statutory Tab -->
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Profile Modal -->
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('profile/information/save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img">
                                            @if(!empty($users))
                                                <img class="inline-block" src="{{ URL::to('/assets/images/' . $users->profile) }}"
                                                    alt="{{ $users->name }}">
                                            @endif
                                            <div class="fileupload btn">
                                                <span class="btn-text">edit</span>
                                                <input class="upload" type="file" id="image" name="images">
                                                @if(!empty($users))
                                                    <input type="hidden" name="hidden_image" id="e_image"
                                                        value="{{ $users->profile }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    @if(!empty($users))
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            value="{{ $users->name }}">
                                                        <input type="hidden" class="form-control" id="employee_id"
                                                            name="employee_id" value="{{ $users->employee_id }}">
                                                        <input type="hidden" class="form-control" id="email" name="email"
                                                            value="{{ $users->email }}">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <div class="cal-icon">
                                                        @if(!empty($users))
                                                            <input class="form-control datetimepicker" type="text" id="birthDate"
                                                                name="birthDate" value="{{ $users->birth_date }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tazkira || NID:</label>
                                                    <div class="cal-icon">
                                                        @if(!empty($users))
                                                            <input class="form-control" type="text" id="nid" name="nid"
                                                                value="{{ $users->nid }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Position: </label>
                                                    <div class="cal-icon">
                                                        @if(!empty($users))
                                                            <input class="form-control " type="text" id="position" name="position"
                                                                value="{{ $users->position }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Join Date: </label>
                                                    <div class="cal-icon">
                                                        @if(!empty($users))
                                                            <input class="form-control " type="text" id="created_at"
                                                                name="created_at" value="{{ $users->created_at }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number: </label>
                                                    <div class="cal-icon">
                                                        @if(!empty($users))
                                                            <input class="form-control " type="number" id="phone" name="phone"
                                                                value="{{ $users->phone }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email: </label>
                                                    <div class="cal-icon">
                                                        @if(!empty($users))
                                                            <input class="form-control " type="email" id="email" name="email"
                                                                value="{{ $users->email }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Blood Group: </label>
                                                    <div class="cal-icon">
                                                        @if(!empty($users))
                                                            <input class="form-control " type="text" id="blood_group"
                                                                name="blood_group" value="{{ $users->blood_group }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="select form-control" id="gender" name="gender">
                                                        @if(!empty($users))
                                                            <option value="{{ $users->gender }}" {{ ($users->gender == $users->gender) ? 'selected' : '' }}>
                                                                {{ $users->gender }}
                                                            </option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            @if(!empty($users))
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="{{ $users->current_address }}">
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile Modal -->

            <!-- Personal Info Modal -->
            <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Passport No</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Passport Expiry Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tel</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nationality <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <div class="cal-icon">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                            <select class="select form-control">
                                                <option>-</option>
                                                <option>Single</option>
                                                <option>Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employment of spouse</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Personal Info Modal -->

            <!-- Family Info Modal -->
            <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Family Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Family Member <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Family Info Modal -->

            <!-- Emergency Contact Modal -->
            <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Emergency Contact Modal -->

            <!-- Education Modal -->
            <div id="education_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Oxford University"
                                                            class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="01/06/2002"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="31/05/2006"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="BE Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Grade A" class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Oxford University"
                                                            class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="01/06/2002"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="31/05/2006"
                                                                class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="BE Computer Science"
                                                            class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Grade A" class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Education Modal -->

            <!-- Experience Modal -->
            <div id="experience_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating"
                                                            value="Digital Devlopment Inc">
                                                        <label class="focus-label">tin Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker"
                                                                value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker"
                                                                value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating"
                                                            value="Digital Devlopment Inc">
                                                        <label class="focus-label">tin Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker"
                                                                value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker"
                                                                value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Experience Modal -->

            <!-- /Page Content -->
        </div>
    @endforeach
@endsection