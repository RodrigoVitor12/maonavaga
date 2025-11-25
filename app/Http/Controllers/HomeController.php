<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $vacancies = Vacancy::all();
        $recruitCount = User::where('role', 1)->count();
        return view('welcome', ['vacancies' => $vacancies, 'recruitCount' => $recruitCount]);
    }
}