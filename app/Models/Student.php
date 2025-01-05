<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
