@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h2 class="text-center p-3">Update Bed</h2>
                <form method="POST", action="{{ route('updateBed') }}" >
                    @CSRF
                @foreach($beds as $bed)
                <div class="form-group">
                    <label for="name" class="form-label">IC Number</label>
                    <input type="text" class="form-control" id="icNo" name="icNo" value="{{$bed->icNo}}" readonly>
                </div>
                <div class="form-group">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{$bed->id}}">
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 46%;">Update</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
    </div>
</div>
@endsection
