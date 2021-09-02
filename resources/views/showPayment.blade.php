@extends('layout')
@section('content')
@if(Session::has('danger'))
<div class="alert alert-danger" role="alert">
    {{Session::get('danger')}}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <h3 class="text-center p-3">Payment List</h3>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IC Number</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{$payment->id}}</td>
                        <td>{{$payment->icNo}}</td>
                        <td>{{$payment->amount}}</td>
                        <td>{{$payment->note}}</td>
                        <td>
                            <a href="{{route('delete.Record',['id'=>$payment->id]) }}" class="delete" title="Delete"
                                data-toggle="tooltip"><button class="btn btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true">&nbspDelete</i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection