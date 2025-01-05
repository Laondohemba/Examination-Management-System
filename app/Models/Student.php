<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $fillable = [
        'examiner_id',
        'examination_id',
        'name',
        'reg_no',
        'email',
        'phone',
        'password'
    ];
}
