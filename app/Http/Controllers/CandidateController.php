<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function show() {
        return view('company.candidates');
    }

    public function allCandidates() {
        if(Auth::user()->role == 2) {
            return redirect()->back();
        }
        
        $candidates = User::where('role', '2')->get();
        return view('company.see_resumes', ['candidates' => $candidates]);
    }
}