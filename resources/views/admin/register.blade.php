@extends('admin/layout')
@section('content')
    <div class="jumbotron">
        <h4 class="text-center">Registration Form</h4>
        <hr><br><br>
        <form method="post"  action="{{ route('employee.store') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputFirstName">First Name:</label>
                    @error('fname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group">
                        <input type="text" name="fname" class="form-control" id="inputFirstName"
                            placeholder="Enter First Name" value="{{ old('fname') }}">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputMiddleName">Middle Name:</label>
                    @error('mname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    <div class="input-group">
                        <input type="text" name="mname" class="form-control" id="inputMiddleName"
                            placeholder="Enter Middle Name" value="{{ old('m name') }}">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputLastName">Last Name:</label>
                    @error('lname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group">
                        <input type="text" name="lname" class="form-control" id="inputLastName"
                            placeholder="Enter Last Name" value="{{ old('lname') }}">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress">Address Line 1:</label>
                    @error('adrs1')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="adrs1" class="form-control" id="inputAddress" value="{{ old('adrs1') }}" placeholder="1234 Main St">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress2">Address Line 2:</label>
                    @error('adrs2')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="adrs2" value="{{ old('adrs2') }}" class="form-control" id="inputAddress2"
                        placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress2">Mobile:</label>
                    @error('mobile')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" id="inputAddress2" placeholder="Enter Mobile">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City:</label>
                    @error('city')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="city" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    @error('state')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="inputState">State:</label>
                    <select id="inputState" name="state" class="form-control">
                        <option value="">Select State</option>
                        <option value="1">Andaman</option>
                        <option value="2">Andhra Pradesh</option>
                        <option value="3">Arunachal Pradesh</option>
                        <option value="4">Assam</option>
                        <option value="5">Bihar</option>
                        <option value="6">Maharashtra</option>
                        <option value="7">Gujarat</option>
                        <option value="8">Haryana</option>
                        <option value="9">Himachal Pradesh</option>
                        <option value="10">Jharkhand</option>
                        <option value="11">Karnataka</option>
                        <option value="12">Kerala</option>

                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip:</label>
                    @error('zip')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <input type="text" name="zip" value="{{ old('zip') }}" class="form-control" id="inputZip">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="gender">Select Gender:</label>
                    @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <select name="gender" id="gender" title="Gender"  class="form-control" >
                        <option value="">-- Select Gender --</option>
                        <option value="M"> Male</option>
                        <option value="F"> Female</option>
                        <option value="O">Other</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
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
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Password:</label>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter Password">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-eye" id="togglePassword"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputPassword4">Confirm Password:</label>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group">
                        <input type="password" name="cpassword" class="form-control" id="cpassword"
                            placeholder="Confirm Password">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-eye" id="toggleCPassword"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <button class="btn btn-primary btn-login text-uppercase fw-bold"
                    style="padding: 0.3rem 1rem; margin: 1rem; letter-spacing: 2.5px" type="submit">add employee</button>
            </center>
        </form>
    </div>
@endsection
