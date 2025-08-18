@extends('layouts.master')
@section('content')
@include('sidebar.menubar')
{!! Toastr::message() !!}


<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Budgets</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Budgets</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_categories"><i
                            class="fa fa-plus"></i> Add Budgets</a>
                </div>
            </div><div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                <div class="dash-widget-info">
                <h5>{{$budget_code}}</h5>
                <span>Budgets Code</span>
                </div>
                </div>
                </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                <div class="dash-widget-info">
                <h5>{{ number_format($budget_code_sum, 0) }} AFG</h5>
                <span>Total Budget</span>
                </div>
                </div>
                </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-money"></i></span>
                <div class="dash-widget-info">
                <h5>{{ number_format($total_cost, 0) }} AFG</h5>
                <span>Cost & Salaries</span>
                </div>
                </div>
                </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                 <div class="card dash-widget">
                <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-money"></i></span>
                <div class="dash-widget-info">
                <h5>{{number_format($remaining, 0)}} AFG</h5>
                <span>Remaining</span>
                </div>
                </div>
                </div>
                </div>
                </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Budget Code</th>
                                <th>Budget Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Budget</th>
                                <th>Tax Amount</th>
                                <th>Budget Amount</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($budgets as $budget)
                            <tr>
                                <td class="id" >{{$budget->id}}</td>
                                <td class="code" >{{$budget->code}}</td>
                                <td class="category" >{{$budget->category}}</td>
                                <td class="start" >{{$budget->start}}</td>
                                <td class="end" >{{$budget->end}}</td>
                                <td class="total_revenue" >{{$budget->total_revenue}}</td>
                                <td class="tax" >{{$budget->tax}}</td>
                                <td class="badget_amount" >{{$budget->badget_amount}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item ExpensesUpdate" data-toggle="modal" data-id="'.$budget->id.'" data-target="#edit_categories"><i class="fa fa-pencil m-r-5"></i> Edit</a>


                                                <a class="dropdown-item"
                                                href="{{url('all/budget/delete/'.$budget->id)}}"
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


    <div class="modal custom-modal fade" id="add_categories" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Budget</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('form/salary/budgets_new')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Budget Code</label>
                            <input class="form-control" type="text" required name="budget_code" placeholder="Budgets Code">
                        </div>

                        <div class="form-group">
                            <label>Budget Type</label>
                            <input class="form-control" type="text" name="budget_category" placeholder="Budgets Category">
                        </div>

                        <div class="form-group">
                            <label>Start Date</label>
                            <div class="cal-icon"><input class="form-control datetimepicker" type="text"
                                    name="start_date" placeholder="Start Date" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>End Date</label>
                            <div class="cal-icon"><input class="form-control datetimepicker" type="text"
                                    name="end_date" placeholder="End Date" >
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Total Budget</label>
                            <div class=""><input class="form-control" type="text" name="total_revenue" required
                                    placeholder="Total Budget"></div>
                        </div>

                        <div class="form-group">
                            <label>Tax:</label>
                            <div class=""><input class="form-control" type="text" name="tax" required
                                    placeholder="tax"></div>
                        </div>

                        <div class=" submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal custom-modal fade" id="edit_categories" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Budget</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ url('form/salary/edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="e_id" >
                        <div class="form-group">
                            <label>Budget Code</label>
                            <input class="form-control" type="text" id="e_code" required name="budget_code" placeholder="Budgets Code">
                        </div>

                        <div class="form-group">
                            <label>Budget Type</label>
                            <input class="form-control" type="text" id="e_category" name="budget_category" placeholder="Budgets Category">
                        </div>

                        <div class="form-group">
                            <label>Start Date</label>
                            <div class="cal-icon"><input class="form-control datetimepicker" id="e_start" type="text"
                                    name="start_date" placeholder="Start Date" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>End Date</label>
                            <div class="cal-icon"><input class="form-control datetimepicker" id="e_end" type="text"
                                    name="end_date" placeholder="End Date" >
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Total Budget</label>
                            <div class=""><input class="form-control" type="text" name="total_revenue" id="e_total_revenue" required
                                    placeholder="Total Budget"></div>
                        </div>

                        <div class="form-group">
                            <label>Tax:</label>
                            <div class=""><input class="form-control" type="text" name="tax" required id="e_tax"
                                    placeholder="tax"></div>
                        </div>

                        <div class="form-group">
                            <label>Total Amount</label>
                            <div class=""><input class="form-control" type="text" id="e_badget_amount" name="total_amount" required
                                    placeholder="Total Amount"></div>
                        </div>

                        <div class=" submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal custom-modal fade" id="delete" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete </h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal"
                                    class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
        $(document).on('click','.ExpensesUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_code').val(_this.find('.code').text());
            $('#e_category').val(_this.find('.category').text());
            $('#e_start').val(_this.find('.start').text());
            $('#e_end').val(_this.find('.end').text());
            $('#e_total_revenue').val(_this.find('.total_revenue').text());
            $('#e_tax').val(_this.find('.tax').text());
            $('#e_badget_amount').val(_this.find('.badget_amount').text());
        });
    </script>
@endsection
