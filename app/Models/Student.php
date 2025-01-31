<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'examiner_id',
        'examination_id',
        'name',
        'reg_no',
        'email',
        'phone',
        'password'
    ];

    public function examination() : BelongsTo
    {
        return $this->belongsTo(Examination::class);
    }
}
