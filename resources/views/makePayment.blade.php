@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="text-center p-3">Make Payment</h2>
            <form method="POST" , action="{{ route('addPayment') }}">
                @CSRF
                <div class="form-group">
                    <label for="IC Number">IC Number</label>
                    <select name="icNo" id="icNo" class="form-control">
                        @foreach($icNo as $patient)
                        <option value="{{$patient->icNo}}">{{$patient->icNo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" min="0">
                </div>
                <div class="form-group">
                    <label for="note" class="form-label">Note</label>
                    <input type="text" class="form-control" id="note" name="note">
                </div>
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 46%;">Submit</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection