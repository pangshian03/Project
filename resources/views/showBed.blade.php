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
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <table class="table">
                <h3 class="text-center p-3">Bed List</h3>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IC Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beds as $bed)
                    <tr>
                        <td>{{$bed->id}}</td>
                        <td>{{$bed->icNo}}</td>
                        <td>
                            <a href="{{route('editBed',['icNo'=>$bed->icNo]) }}" class="edit" title="Edit"
                                data-toggle="tooltip"><button class="btn btn-success"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true">&nbsp Update</i></button></a>
                            <a href="{{route('deleteBed',['id'=>$bed->id]) }}" class="delete" title="Delete"
                                data-toggle="tooltip"><button class="btn btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true">&nbsp Delete</i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-sm-2"></div>
        </div>
    </div>
</div>
@endsection