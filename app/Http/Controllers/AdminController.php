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

    public function candidates() {
        if(Auth::user()->role != 0) {
            return redirect()->back();
        }
        $users = User::where('role', '2')->paginate(10);
        return view('admin.candidates', compact('users'));
    }

    public function companies() {
        if(Auth::user()->role != 0) {
            return redirect()->back();
        }
        $users = User::whereIn('role', ['0', '1'])->paginate(10);
        return view('admin.companies', compact('users'));
    }
    
    public function vacancies() {
        if(Auth::user()->role != 0) {
            return redirect()->back();
        }
        $vacancies = Vacancy::with('user')->paginate(10);
        return view('admin.vacancies', compact('vacancies'));
    }
    
    public function applies() {
        if(Auth::user()->role != 0) {
            return redirect()->back();
        }
         $applies = Apply::with('user')->with('vacancy')->paginate(10);
        return view('admin.applies', compact('applies'));
    }

    public function edit ($id = null) {
        if(Auth::user()->role != 0) {
            return redirect()->back();
        }
        $user = User::find($id);
        return view('admin.edit', compact('user'));  
    }

    public function update(Request $request, User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->plan = $request->plan;
        $user->vacancies_limit = $request->vacancies_limit;
        $user->expires_at = $request->expires_at;

        $user->save();

        return redirect()
            ->route('admin.edit', $user->id)
            ->with('success', 'Usuário atualizado com sucesso!');
    }
}