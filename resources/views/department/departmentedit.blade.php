
@extends('layouts.master')
@section('content')
@include('sidebar.menubar')

<div class="page-wrapper">

<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Department</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Department</li>
</ul>
</div>

</div>
</div>
<div class="row">
    <div class="col-sm-12">
    <form action="{{url('departmentedit/'.$department->id)}}" method="post" enctype="multipart/form-data" >
        @csrf
    <div class="form-group">
    <label>Department Name <span class="text-danger">*</span></label>
    <input class="form-control" type="text" required   value="{{$department->department}}" name="name">
    </div>
    <div class="submit-section">
    <button class="btn btn-primary submit-btn">Update</button>
    </div>
    </form>
</div></div>
</div>


</div>


@endsection
