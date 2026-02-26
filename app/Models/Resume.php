<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'city',
        'birth_date',
        'summary',
        'desired_job_type',
        'availability',
        'salary_expectation',
        'skills',
        'languages',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function experiences()
    {
        return $this->hasMany(\App\Models\Experience::class);
    }

    public function educations()
    {
        return $this->hasMany(\App\Models\Education::class);
    }
}