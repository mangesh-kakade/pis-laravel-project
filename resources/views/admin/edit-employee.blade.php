@extends('admin/layout')

@section('content')
<div class="container-fluid mt-5">
    <h3 class="text-center">Edit Employee</h3>
    <hr><br><br>

    <form method="post" action="{{ route('employee.update', ['id' => $employee->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row mt-4">
            <div class="form-group col-md-4">
                <label for="inputFirstName">First Name:</label>
                @error('fname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="fname" class="form-control" id="inputFirstName" placeholder="Enter First Name" value="{{ $employee->fname }}">
            </div>

            <div class="form-group col-md-4">
                <label for="inputMiddleName">Middle Name:</label>
                @error('mname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="mname" class="form-control" id="inputMiddleName" placeholder="Enter Middle Name" value="{{ $employee->mname }}">
            </div>

            <div class="form-group col-md-4">
                <label for="inputLastName">Last Name:</label>
                @error('lname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="lname" class="form-control" id="inputLastName" placeholder="Enter Last Name" value="{{ $employee->lname }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputAddress1">Address Line 1:</label>
                @error('adrs1')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="adrs1" class="form-control" id="inputAddress1" placeholder="1234 Main St" value="{{ $employee->adrs1 }}">
            </div>

            <div class="form-group col-md-3">
                <label for="inputAddress2">Address Line 2:</label>
                <input type="text" name="adrs2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{ $employee->adrs2 }}">
            </div>

            <div class="form-group col-md-3">
                <label for="inputMobile">Mobile:</label>
                @error('mobile')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="mobile" class="form-control" id="inputMobile" placeholder="Enter Mobile" value="{{ $employee->mobile }}">
            </div>
            <div class="form-group col-md-3">
                <label for="inputZip">Zip:</label>
                @error('zip')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="text" name="zip" value="{{ $employee->zip }}" class="form-control" id="inputZip">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="gender">Select Gender:</label>
                @error('gender')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <select name="gender" id="gender" title="Gender" class="form-control">
                    <option value="">-- Select Gender --</option>
                    <option value="M"> Male</option>
                    <option value="F"> Female</option>
                    <option value="O">Other</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="gender">User Type:</label>
                @error('usertype')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <select name="usertype" id="gender" title="Gender" class="form-control">
                    <option value="">-- Select User --</option>
                    <option value="1"> Admin</option>
                    <option value="2"> Super-Admin</option>
                    <option value="3"> End-User </option>
                </select>
            </div>

        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update Employee</button>
        </div>
    </form>
</div>
@endsection

