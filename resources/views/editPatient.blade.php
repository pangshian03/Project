@extends('layout')
@section('content')

    <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h2 class="text-center p-3">Update Patient</h2>
                <form method="POST", action="{{ route('updatePatient') }}" >
                    @CSRF
                @foreach($patients as $patient)
                <div class="form-group">
                    <label for="name" class="form-label">IC Number</label>
                    <input type="text" class="form-control" id="icNo" name="icNo" value="{{$patient->icNo}}"  readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="patientName" value="{{$patient->name}}">
                </div>
                <div class="form-group" style="display:inline;">
                    <label for="gender" class="form-label">Gender</label><br>
                    <table>
                        <tr>
                            <td><input type="radio" id="male" name="gender" value="{{$patient->gender}}"></td>
                            <td><label for="male">Male</label></td>
                            <td><input type="radio" id="female" name="gender" value="{{$patient->gender}}" style="margin-left: 50px;"></td>
                            <td><label for="female">Female</label></td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" min="1" value="{{$patient->age}}">
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$patient->address}}">
                </div>
                <div class="form-group">
                    <label for="phoneNo" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="{{$patient->phoneNo}}">
                </div>
            
                @endforeach
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 46%;">Update</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
    </div>

@endsection
