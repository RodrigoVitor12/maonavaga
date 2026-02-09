<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;

/**
 * @property \Illuminate\Database\Eloquent\Collection|Vacancy[] $appliedVacancies
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'website',
        'address',
        'user_id'
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //1 entrevista tem varios candidatos
    public function interviews() {
        return $this->hasMany(ScheduleInterview::class, 'user_id');
    }

    // 1 entrevista pertence a 1 empresa
    public function interview() {
        return $this->hasMany(ScheduleInterview::class, 'candidate_id');
    }
    
    public function resume() {
        return $this->hasOne(Resume::class);
    }

    // A user create many vacancies
    public function vacancies() 
    {
        return $this->hasMany(Vacancy::class);
    }

    // A user apply a many vacancies
    public function appliedVacancies()
    {
        return $this->belongsToMany(Vacancy::class, 'applies')->withTimestamps();
    }
    
    public function applies()
    {
        return $this->hasManyThrough(Apply::class, Vacancy::class);
    }

    // Return my applies as user candidate
    public function allMyCandidacies () {
        return $this->appliedVacancies()->with('user')->get();
    }

    // Return all vacancies of user candidate with count
    public function vacanciesWithCandidacyCount()
    {
        return $this->vacancies()->where('user_id', Auth::id())->withCount('applies')->get();
    }

    // Return all applies the user company has.
    public function allApplies()
    {
        return $this->applies()->with('user')->get();
    }

    // Return all my candidates as user company
    public function allMyCandidates () 
    {
        return Apply::whereHas('vacancy', function($q) {
            $q->where('user_id', $this->id);
        });
    }
}