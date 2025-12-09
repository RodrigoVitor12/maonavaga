<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Vacancy extends Model
{
    protected $fillable = ['name', 'title', 'description','type', 'salary', 'address', 'email_contact', 'requirements', 'benefits', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'applies')->withTimestamps();
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }
}