<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;// Make sure to import the Employee model

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }

    public function emplist()
    {
        //$employees= Employee::all();
        //$employees = Employee::orderBy('id','desc');
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('admin.employees', compact('employees'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            // Attempt to insert data into the 'employees' table
            $employee = Employee::create([
                'fname' => $data['fname'],
                'mname' => $data['mname'],
                'lname' => $data['lname'],
                'adrs1' => $data['adrs1'],
                'adrs2' => $data['adrs2'],
                'mobile' => $data['mobile'],
                'city' => $data['city'],
                'state' => $data['state'],
                'zip' => $data['zip'],
                'gender' => $data['gender'],
                'usertype' => $data['usertype'],
                'password' => bcrypt($data['password']), // Hash the password
            ]);

            // Check if insertion was successful
            if ($employee) {
                return redirect()->route('employee.emplist')->with('success', 'Employee created successfully');
            } else {
                return back()->with('error', 'Failed to create employee');
            }
        } catch (\Exception $e) {
            \Log::error($e); // Log the error
            return back()->with('error', 'An error occurred while creating the employee.');
        }
    }

}
