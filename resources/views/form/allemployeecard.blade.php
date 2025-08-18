@extends('layouts.master')
@section('content')
    @include('sidebar.menubar')


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-lists-center">
                    <div class="col">
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i
                                class="fa fa-plus"></i> Add Employee</a>
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
            <form action="{{ route('all/employee/search') }}" method="POST">
                @csrf
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="employee_id">
                            <label class="focus-label">Employee ID</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="name">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="position">
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
            <div class="row staff-grid-row">
                @foreach ($users as $lists)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="{{ url('employee/profile/' . $lists->rec_id) }}" class="avatar"><img
                                        src="{{ URL::to('/assets/images/' . $lists->profile) }}" alt="{{ $lists->avatar }}"
                                        alt="{{ $lists->avatar }}" style="width:80px;height:80px" ></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                        class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('all/employee/view/edit/' . $lists->rec_id) }}"><i
                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="{{url('all/employee/delete/' . $lists->rec_id)}}"
                                        onclick="return confirm('Are you sure to want to delete it?')"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="#">{{ $lists->name }}</a></h4>
                            <div class="small text-muted">{{ $lists->position }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /Page Content -->


        <!-- Add Employee Modal -->
        <!-- Add Employee Modal -->
        <div id="add_employee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('all/employee/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Name Selection -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Full Name</label>
                                        <select class="select" id="name" name="name">
                                            <option value="">-- Select --</option>
                                            @foreach ($userList as $user)
                                                <option value="{{ $user->name }}" data-employee_id="{{ $user->rec_id }}"
                                                    data-email="{{ $user->email }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Father Name & Email -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Father Name: </label>
                                        <input class="form-control" required type="text" id="fname" name="fname"
                                            placeholder="Example: Azizullah">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required type="hidden" id="email" name="email" readonly>
                                    </div>
                                </div>

                                <!-- Birth Date -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control required datetimepicker" type="text" id="birthDate"
                                                name="birthDate">
                                        </div>
                                    </div>
                                </div>

                                <!-- NID -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tazkira || NID</label>
                                        <input class="form-control" required type="text" name="nid"
                                            placeholder="Example: 1400-0404-76952">
                                    </div>
                                </div>

                                <!-- Blood Group -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blood Group</label>
                                        <select class="select form-control" name="blood_group">
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                            <option value="O+">O+</option>
                                            <option value="Unknown">Unknown</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" required type="text" name="phone_number"
                                            placeholder="Example: +93(0) 702-079-812">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency Phone Number</label>
                                        <input class="form-control" required type="text" name="second_number"
                                            placeholder="Example: +93(0) 702-079-812">
                                    </div>
                                </div>

                                <!-- Account Number -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number</label>
                                        <input class="form-control" required type="text" name="account_number"
                                            placeholder="Example: 140-072-1860">
                                    </div>
                                </div>

                                <!-- Position -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input class="form-control" required type="text" name="position"
                                            placeholder="Example: Program Manager">
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="select form-control" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Employee ID -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" required id="employee_id" name="employee_id"
                                            placeholder="Auto id employee">
                                    </div>
                                </div>

                                <!-- Project -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project: </label>
                                        <select class="select form-control" name="project">
                                            @foreach($projects as $project)
                                                <option value="{{$project->code}}">{{$project->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Work Station -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Work Station</label>
                                        <input class="form-control" required type="text" name="work_station"
                                            placeholder="Example: Kabul (Main - Office)">
                                    </div>
                                </div>

                                <!-- Gross Salary -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gross Salary</label>
                                        <input class="form-control" required type="text" name="gross_salary"
                                            placeholder="Example: 48000 Afghani">
                                    </div>
                                </div>

                                <!-- Department -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Department: </label>
                                        <select class="select form-control" name="department">
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->department}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Current Address -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Current Address <small>(Village, Zip Code, City, Province)</small></label>
                                        <textarea name="current_address" cols="30" rows="4" class="form-control"
                                            required></textarea>
                                    </div>
                                </div>

                                <!-- Permanent Address -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Permanent Address <small>(Village, Zip Code, City, Province)</small></label>
                                        <textarea name="permanent_address" cols="30" rows="4" class="form-control"
                                            required></textarea>
                                    </div>
                                </div>

                                <!-- Profile Image Upload (Modern Preview) -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Upload Profile Image <small>(Max: 5MB)</small></label>
                                        <input type="file" name="profile" id="profileImage" class="form-control"
                                            required accept="image/*">
                                        <div class="image-preview mt-2" id="profileImagePreview" style="display:none;">
                                            <img src="" alt="Preview" class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    </div>
                                </div>

                                <!-- NID Attachment -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Upload NID / Tazkira <small>(Max: 5MB)</small></label>
                                        <input type="file" name="nid_attachment" class="form-control"
                                            required accept="application/pdf,image/*">
                                    </div>
                                </div>

                                <!-- Supporting Document -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Upload Supporting Document <small>(Max: 10MB)</small></label>
                                        <input type="file" name="document" class="form-control"
                                            required accept="application/pdf,image/*">
                                    </div>
                                </div>

                                <!-- CV Upload -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Upload CV <small>(PDF only, Max: 5MB)</small></label>
                                        <input type="file" name="cv" class="form-control" required accept="application/pdf">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-md-12">
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </div>
                            </div> <!-- /row -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Employee Modal -->

        <!-- /Add Employee Modal -->

    </div>
    <!-- /Page Wrapper -->
    @section('script')
        <script>
            $("input:checkbox").on('click', function () {
                var $box = $(this);
                if ($box.is(":checked")) {
                    var group = "input:checkbox[class='" + $box.attr("class") + "']";
                    $(group).prop("checked", false);
                    $box.prop("checked", true);
                }
                else {
                    $box.prop("checked", false);
                }
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.select2s-hidden-accessible').select2({
                    closeOnSelect: false
                });
            });
        </script>
        <script>
            // select auto id and email
            $('#name').on('change', function () {
                $('#employee_id').val($(this).find(':selected').data('employee_id'));
                $('#email').val($(this).find(':selected').data('email'));
            });
        </script>
        {{-- update js --}}
        <script>
            $('#profileImage').on('change', function (e) {
                const file = e.target.files[0];
                const preview = $('#profileImagePreview');
                const previewImg = preview.find('img');

                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.attr('src', e.target.result);
                        preview.show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    preview.hide();
                    previewImg.attr('src', '');
                }
            });
        </script>

        <script>
            $(document).on('click', '.userUpdate', function () {
                var _this = $(this).parents('tr');
                $('#e_id').val(_this.find('.id').text());
                $('#e_name').val(_this.find('.name').text());
                $('#e_email').val(_this.find('.email').text());
                $('#e_phone_number').val(_this.find('.phone_number').text());
                $('#e_second_number').val(_this.find('.second_number').text());

                $('#e_image').val(_this.find('.image').text());

                var name_role = (_this.find(".role_name").text());
                var _option = '<option selected value="' + name_role + '">' + _this.find('.role_name').text() + '</option>'
                $(_option).appendTo("#e_role_name");

                var position = (_this.find(".position").text());
                var _option = '<option selected value="' + position + '">' + _this.find('.position').text() + '</option>'
                $(_option).appendTo("#e_position");

                var department = (_this.find(".department").text());
                var _option = '<option selected value="' + department + '">' + _this.find('.department').text() + '</option>'
                $(_option).appendTo("#e_department");

                var statuss = (_this.find(".statuss").text());
                var _option = '<option selected value="' + statuss + '">' + _this.find('.statuss').text() + '</option>'
                $(_option).appendTo("#e_status");

            });
        </script>
    @endsection

@endsection