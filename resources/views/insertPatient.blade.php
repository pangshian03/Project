@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h2 class="text-center p-3">Create New Patient</h2>
                <form method="POST", action="{{ route('addPatient') }}" >
                    @CSRF
                <div class="form-group">
                    <label for="icNo" class="form-label">IC Number</label>
                    <input type="text" class="form-control" id="icNo" name="icNo">
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group" style="display:inline;">
                    <label for="gender" class="form-label">Gender</label><br>
                    <table>
                        <tr>
                            <td><input type="radio" id="male" name="gender" value="male"></td>
                            <td><label for="male">Male</label></td>
                            <td><input type="radio" id="female" name="gender" value="female" style="margin-left: 35px;"></td>
                            <td><label for="female">Female</label></td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" min="1" >
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="phoenNo" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNo" name="phoneNo">
                </div>
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 46%;">Submit</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
    </div>
</div>
@endsection
