@extends('admin/layout')

@section('content')
    <h3 class="text-center">Employees</h3>
    <hr>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h3 class="mb-4 text-gray-800">Registered Employees</h3>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->fname . ' ' . $employee->lname }}</td>
                                    <td>{{ $employee->adrs1 . ' ' . $employee->adrs2 }}</td>
                                    <td>{{ $employee->city }}</td>
                                    <td>{{ $employee->state }}</td>
                                    <td>{{ $employee->mobile }}</td>
                                    <td>
                                        @if ($employee->gender == 'M')
                                            Male
                                        @elseif ($employee->gender == 'F')
                                            Female
                                        @else
                                            Other
                                        @endif
                                    </td>
                                    <td>Software Engineer</td>
                                    <td style="text-align: center">
                                        {{-- {{ route('employee.edit', $employee->id) }}
                                            {{ route('employee.destroy', $employee->id) }}
                                        --}}
                                        <a href="#" class=""> <i class="fas fa-pencil-alt" style="color: blue;"></i> </a> &nbsp;
                                        <a href="#" class=""> <i class="fas fa-trash" style="color: red;"></i></a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
