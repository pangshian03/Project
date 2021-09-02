@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="text-center p-3">Create New Bed</h2>
            <form method="POST" , action="{{ route('addBed') }}">
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
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id">
                </div>
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 46%;">Submit</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection