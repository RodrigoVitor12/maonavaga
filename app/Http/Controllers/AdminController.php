<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        
    }
    
    public function index() {
        if(Auth::user()->role != 0) {
            return redirect()->back();
        }
        $users = User::paginate(10);
        $vacancies = Vacancy::with('user')->paginate(10);
        $applies = Apply::with('user')->with('vacancy')->paginate(10);
        

        return view('admin.index', compact('users', 'vacancies', 'applies'));

    }
}