<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee_reg';
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'adrs1',
        'adrs2',
        'mobile',
        'city',
        'state',
        'zip',
        'gender',
        'usertype',
        'password',
    ];
}
