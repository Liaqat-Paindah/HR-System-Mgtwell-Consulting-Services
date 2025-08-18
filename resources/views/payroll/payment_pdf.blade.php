<!DOCTYPE html>
<html>

<head>
    <title>PaySlip - PDF </title>

    <style>
        * {
            font-family: Calibri, sans-serif;
        }

        h4, h5, h6
        {
            text-align: center;
            margin: 6px;
        }
        /* Styles for print */
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .no-print {
                display: none;
            }

            .container {
                width: 100%;
                margin: 0 auto;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
            }

            .col {
                flex: 1;
                padding: 10px;
            }

            .text-center {
                text-align: center;
            }

            /* Add more styles as needed */
        }

        .img
        {
            background: url(../../../public/assets/images/logo.png);
            width: 20%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd;
        }

        .table-striped tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-hover tr:hover {
            background-color: #ddd;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        .Signature-1
        {
            font-size: 12px;
            float: left;
            display: inline;
            width: 50%;
            text-align: center;
        }
    .Signature-1 p
        {
        font-weight: bold;
        }
        .Signature-2
        {
            font-size: 12px;
            width: 50%;
            float: left;
            display: inline;
            text-align: center;
        }
        .Signature-2 p
        {
        font-weight: bold;
        }
    </style>

</head>

<body>
 <div class="container-fluid">
 <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title"> Mgtwell Consulting Services
                            </h4>
                            <h5>Payslip for the month of  {{ \Carbon\Carbon::create()->month($users->month)->format('F')  }} {{
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
                                        <td>{{ $users->budget_code  }}</td>
                                    </tr>
                                    <tr>
                                        <th>Voucher Number:</th>
                                        <td> {{ $users->rec_id }}  </td>
                                        <th>Date:</th>
                                        <td>  {{ \Carbon\Carbon::parse($users->salary_created_at)->format('Y-m-d') }}</td>
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
                                        <td> {{ $users->days }}  </td>
                                        <th>Paid and Leave Accepted Days:</th>
                                        <td> {{ $users->paiddays}}  </td>
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
                                        <td> {{$users->net_amount}} </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row m-2">
                                <div class="Signature-1">
                                    <p>Finance Manager Signature</p>
                                    <span>Ahmad Noorani </span>
                                </div>
                                <div class="Signature-2">
                                    <p>Employee Signature</p>
                                    <span>{{$users->name}} </span>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <br><br> <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title"> Mgtwell Consulting Services
                            </h4>
                            <h5>Payslip for the month of  {{ \Carbon\Carbon::create()->month($users->month)->format('F')  }} {{
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
                                        <td>{{ $users->budget_code  }}</td>
                                    </tr>
                                    <tr>
                                        <th>Voucher Number:</th>
                                        <td> {{ $users->rec_id }}  </td>
                                        <th>Date:</th>
                                        <td>  {{ \Carbon\Carbon::parse($users->salary_created_at)->format('Y-m-d') }}</td>
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
                                        <td> {{ $users->days }}  </td>
                                        <th>Paid and Leave Accepted Days:</th>
                                        <td> {{ $users->paiddays }}  </td>
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
                                        <td> {{$users->net_amount}} </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row m-2">
                                <div class="Signature-1">
                                    <p>Finance Manager Signature</p>
                                    <span>Ahmad Noorani </span>
                                </div>
                                <div class="Signature-2">
                                    <p>Employee Signature</p>
                                    <span>{{$users->name}} </span>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
 </div>
    <script>
        function Paid_Date() {
            var days = new Date();
            document.getElementById('now').innerHTML = days;

        }

    </script>
</body>

</html>
