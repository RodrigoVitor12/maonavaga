<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ScheduleInterview extends Model
{
    protected $fillable = ['date', 'time', 'location', 'notes', 'type', 'vacancy_id', 'user_id', 'candidate_id'];

    //1 candidato pertence a 1 entrevista
    public function candidate() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 1 empresa tem varias entrevistas
    public function scheduledInterview() {
        return $this->belongsTo(User::class, 'candidate_id');
    }


    public function myInterview() {
        return $this->query()->where('user_id', Auth::id());
    }
}