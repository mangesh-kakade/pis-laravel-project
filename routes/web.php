<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\LeavesController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/admin', [AdminController::class,'index']);
Route::post('/admin/auth', [AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'], function(){

    Route::get('admin/dashboard', [AdminController::class,'dashboard']);
    Route::get('admin/employee-reg', [EmployeeController::class,'index']);

    Route::get('admin/employees', [EmployeeController::class,'emplist'])->name('employee.emplist');
    Route::get('admin/register-employee', [EmployeeController::class,'index']);

    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');

    Route::get('admin/employees/{employee}/edit', [EmployeeController::class,'edit'])->name('employee.edit');

    Route::put('admin/employees/{id}', [EmployeeController::class, 'update'])->name('employee.update');

    //Route::delete('employee/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');

    Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');

    Route::get('admin/leaves', [LeavesController::class,'index']);
    Route::get('admin/rejected-leaves', [LeavesController::class,'rejected']);
    Route::get('admin/approved-leaves', [LeavesController::class,'approved']);


    Route::get('admin/logout', function () {

        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logged Out..');
        return redirect('admin');

    });


});




