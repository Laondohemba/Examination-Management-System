<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    protected $fillable = [
        'examination_id',
        'type',
        'question',
        'option_one',
        'option_two',
        'option_three',
        'option_four',
        'option_five',
        'answer',
        'marks',
    ];

    public function examination() : BelongsTo
    {
        return $this->belongsTo(Examination::class);
    }
}
