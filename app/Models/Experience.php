<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'resume_id',
        'position',
        'company',
        'start_date',
        'end_date',
        'currently_working',
        'activities',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}