@extends('layout')
@section('content')
<div class="container">
    <div class="icons bg-light">
        <div class="row p-2">
            <div class="text-center col-4 p-5">
                <a href="" class="nav-link text-dark"><i class="fa fa-wheelchair fa-4x text-warning"></i><br>Patient</a>
            </div>
            <div class="text-center col-4 p-5">
                <a href="#" class="nav-link text-dark"><i class="fa fa-bed fa-4x text-danger"></i><br>Hospital Bed</a>
            </div>
            <div class="text-center col-4 p-5 text-black">
                <a href="#" class="nav-link text-dark"><i class="fa fa-user-circle-o fa-4x text-info"></i><br>Admin</a>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-4 text-center text-black mb-5">
                <a href="#" class="nav-link text-dark"><i class="fa fa-user-md fa-4x text-success"></i><br>Doctor</a>
            </div>
            <div class="col-4 text-center text-black mb-5">
                <a href="#" class="nav-link text-dark"><i class="fa fa-stethoscope fa-4x text-secondary"></i><br>Nurse</a>
            </div>
            <div class="col-4 text-center text-black mb-5">
                <a href="#" class="nav-link text-dark"><i class="fa fa-heartbeat fa-4x text-dark"></i><br>Employee</a>
            </div>
        </div>
    </div>
</div>
        
@endsection