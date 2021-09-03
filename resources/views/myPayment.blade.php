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
        <div class="col-sm-12">
            <table class="table">
                <h3 class="text-center p-3">My Payment</h3>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IC Number</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Date Time</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{$payment->id}}</td>
                            <td>{{$payment->icNo}}</td>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->note}}</td>
                            <td>{{$payment->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </form>
            </table>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            {{ $payments->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>

@endsection