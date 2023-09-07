<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            return redirect('admin/dashboard');
        }
        else
        {
            return view('admin.adm-login');
        }
        return view('admin.adm-login');
    }


    public function auth(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        // Validation messages
        $messages = [
            'email.required' => '* Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => '* Password is required.',
        ];

        // Validate the input data
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect('admin')
                ->withErrors($validator)
                ->withInput();
        }



        //return $request->post();
        $email = $request->post('email');
        $password = $request->post('password');

        //$result = Admin::where(['email'=>$email,'password'=>$password])->get();
        $result = Admin::where(['email'=>$email])->first();
        if($result)
        {
            if(Hash::check($request->post('password'), $result->password))
            {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            }
            else
            {
                $request->session()->flash('error', 'Oops..! Invalid Username/password.');
                return redirect('admin');

            }
        }
    }
    public function dashboard()
    {

        // Fetch user types and their counts
        $userTypes = DB::table('employee_reg')->select('usertype', DB::raw('count(*) as user_count'))->groupBy('usertype')->get();


        return view('admin.dashboard', compact('userTypes'));

    }
}
