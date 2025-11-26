<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;

class HomeController extends Controller
{
    public function index () {
        $vacancies = Vacancy::all();
        $recruitCount = User::where('role', 1)->count();
        $candidateCount = User::where('role', '2')->count();
        return view('welcome', ['vacancies' => $vacancies, 'recruitCount' => $recruitCount, 'candidateCount' => $candidateCount]);
    }
}