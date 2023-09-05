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
        return view('admin.employees');
    }

    public function store(Request $request)
    {
        // Validate the form data

        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'adrs1' => 'nullable|string|max:255',
            'adrs2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'gender' => 'required|string|max:255',
            'usertype' => 'required|string|max:255',
            'password' => 'required|string|min:6', // Adjust the minimum length as needed
        ]);

        // Create a new Employee instance and assign validated data
        $employee = new Employee($validatedData);

        // Hash the password before saving it to the database
        $employee->password = Hash::make($validatedData['password']);

        // Save the employee data to the database
        $employee->save();

        // Redirect or return a response
        return redirect('admin/employees');

    }
}
