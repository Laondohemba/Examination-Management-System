<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Examination extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'examiner_id',
        'exam_name',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
    ];

    public function examiner() : BelongsTo
    {
        return $this->belongsTo(Examiner::class);
    }

}
