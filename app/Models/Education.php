<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'resume_id',
        'course_type',
        'institution',
        'status',
    ];
    protected $table = 'educations';
    

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}