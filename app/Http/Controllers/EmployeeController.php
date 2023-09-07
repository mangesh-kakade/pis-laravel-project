<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

        // Validation rules for your form fields
        $rules = [
            'fname' => 'required|string|max:255|min:3|regex:/^[A-Za-z\s]+$/',
            'mname' => 'nullable|string|max:255|min:3|regex:/^[A-Za-z\s]+$/',
            'lname' => 'required|string|max:255|min:3|regex:/^[A-Za-z\s]+$/',
            'adrs1' => 'required|string|max:255|min:3',
            'adrs2' => 'nullable|string|max:255|min:3',
            'mobile' => 'required|string|regex:/^[0-9]{10}$/|max:10',

            'city' => 'required|string|max:255|min:3',
            'state' => 'required|integer',

            'zip' => 'required|string|max:6|regex:/^[0-9]{10}$/',
            'gender' => 'required|in:M,F,O',
            'usertype' => 'required|in:1,2,3',
            'password' => 'required|string|min:6|confirmed',
        ];

        // Custom validation messages
        $messages = [
            'mobile.regex' => 'The mobile number must be exactly 10 digits.',
            'gender.in' => 'Please select a valid gender.',
            'usertype.in' => 'Please select a valid user type.',
            'fname.regex' => 'Numbers are not allowed in the First Name field.',
            'mname.regex' => 'Numbers are not allowed in the Middle Name field.',
            'lname.regex' => 'Numbers are not allowed in the Last Name field.',
            'zip.regex' => 'Only Numbers are aloweded in this field.',

        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


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

    public function edit($id)
    {
        // Retrieve the employee record by its ID
        $employee = Employee::find($id);
        //echo  $employee;
        if (!$employee) {
            // Handle the case where the employee record is not found, for example, redirect to a 404 page.
            echo "invalid request";
        }
        // Load the edit view and pass the employee data to it
        return view('admin.edit-employee', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        // Define validation rules and custom error messages
        $rules = [
            'fname' => 'required|string|max:255|min:3|regex:/^[A-Za-z\s]+$/',
            'mname' => 'nullable|string|max:255|min:3|regex:/^[A-Za-z\s]+$/',
            'lname' => 'required|string|max:255|min:3|regex:/^[A-Za-z\s]+$/',
            'adrs1' => 'required|string|max:255|min:3',
            'adrs2' => 'nullable|string|max:255|min:3',
            'mobile' => 'required|string|regex:/^[0-9]{10}$/|max:10',
            // Add validation rules for other fields as needed
        ];

        $messages = [
            'mobile.regex' => 'The mobile number must be exactly 10 digits.',
            'fname.regex' => 'Numbers are not allowed in the First Name field.',
            'mname.regex' => 'Numbers are not allowed in the Middle Name field.',
            'lname.regex' => 'Numbers are not allowed in the Last Name field.',
            // Add custom error messages for other validation rules as needed
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Find the employee by ID
        $employee = Employee::findOrFail($id);

        try {
            // Update the employee's attributes
            $employee->update([
                'fname' => $request->input('fname'),
                'mname' => $request->input('mname'),
                'lname' => $request->input('lname'),
                'adrs1' => $request->input('adrs1'),
                'adrs2' => $request->input('adrs2'),
                'mobile' => $request->input('mobile'),
                // Update more attributes as needed
            ]);

            // Log a success message
            Log::info('Employee updated successfully');

            // Redirect to a success page or the employee's edit page with a success message
            return redirect()->route('employee.emplist')->with('success', 'Employee updated successfully');
        } catch (\Exception $e) {
            // Log any exceptions or errors
            Log::error('Error updating employee: ' . $e->getMessage());

            // Handle the error and redirect as needed
            return back()->with('error', 'An error occurred while updating the employee.');
        }
    }

    public function destroy($id)
    {
        try {
            // Find the employee by ID
            $employee = Employee::findOrFail($id);

            // Perform the deletion
            $employee->delete();

            return redirect()->route('employee.emplist')->with('success', 'Employee deleted successfully');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return back()->with('error', 'An error occurred while deleting the employee.');
        }
    }


}
