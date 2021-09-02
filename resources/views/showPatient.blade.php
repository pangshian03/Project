@extends('layout')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('danger')}}
    </div>
@endif
<div class="container">
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <table class="table">
            <h3 class="text-center p-3">Patient List</h3>
            <thead>
                <tr>
                    <th>IC Number</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr>
                    <td>{{$patient->icNo}}</td>
                    <td>{{$patient->name}}</td>
                    <td>{{$patient->gender}}</td>
                    <td>{{$patient->age}}</td>
                    <td>{{$patient->address}}</td>
                    <td>{{$patient->phoneNo}}</td>
                    <td>
                        <a href="{{route('editPatient',['icNo'=>$patient->icNo]) }}"class="edit" title="Edit" data-toggle="tooltip"><button class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp Update</i></button></a>
                        <a href="{{route('deletePatient',['icNo'=>$patient->icNo]) }}"class="delete" title="Delete" data-toggle="tooltip"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true">&nbsp Delete</i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-1"></div>
    </div>
</div>
</div>

@endsection