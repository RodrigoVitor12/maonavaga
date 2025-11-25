<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $vacancies = Vacancy::all()->count();
        $recruitCount = User::where('role', 1)->count();
        $candidateCount = User::where('role', 2)->count();
        return view('about', ['vacancies' => $vacancies, 'recruitCount' => $recruitCount, 'candidateCount' => $candidateCount]);
    }
}