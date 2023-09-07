<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeavesController extends Controller
{
    public function index()
    {
        return view('admin.leaves');
    }
    public function rejected()
    {
        return view('admin.rejected-leaves');
    }

    public function approved()
    {
        return view('admin.approved-leaves');
    }
}
