<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    /** @use HasFactory<\Database\Factories\ResponseFactory> */
    use HasFactory;
    protected $fillable = [
        'student_id',
        'question_id',
        'response',
        'scores',
        'remarks',
    ];
}
