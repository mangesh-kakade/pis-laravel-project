@extends('admin/layout')
@section('content')
<h3 class="text-center mt-5">Pending Leaves</h3>
<hr>
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pending Leave Requests</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Employee Name</th>
                        <th>Leave Type</th>
                        <th>Leave From</th>
                        <th>Leave To</th>
                        <th>Leave Day</th>
                        <th>Leave Reason</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a onclick='return confirm("Are you Sure to Approve this leave..!")' href=""  style="color: green;"><i class="fas fa-check"></i></a>
                            &nbsp; &nbsp;
                            <a onclick='return confirm("Are you Sure to Reject this leave..!")' href=""  style="color: red;"><i class="fas fa-times"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
