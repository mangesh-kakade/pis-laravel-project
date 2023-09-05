<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.adm-login');
});

Route::get('/admin', [AdminController::class,'index']);
Route::post('/admin/auth', [AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'], function(){
    Route::get('admin/dashboard', [AdminController::class,'dashboard']);
    Route::get('admin/employee-reg', [EmployeeController::class,'index']);
    Route::get('admin/employees', [EmployeeController::class,'emplist'])->name('employee.emplist');





    Route::get('admin/register-employee', [EmployeeController::class,'index']);
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');



    Route::get('admin/logout', function () {

        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logged Out..');
        return redirect('admin');

    });


});




