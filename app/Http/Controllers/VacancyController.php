<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    public function create()
    {
        $user = User::where('id', Auth::id())->select('role')->first();
        if ($user->role == 1 || $user->role == 0)
            return view('company.create-job');
        return redirect()->back();
    }

    public function detail($id)
    {
        $vacancy = Vacancy::where('id', $id)->first();
        if ($vacancy)
            return view('vacancydetails', ['vacancy' => $vacancy]);
        return redirect()->back();
    }

    public function show()
    {
        $vacancies = Vacancy::latest()->paginate(21);

        return view('vacancies', ['vacancies' => $vacancies]);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        if ($user->role == 1 || $user->role == 0) {
            try {
                $user->vacancies()->create([
                    'name'         => $request['name'],
                    'title'         => $request['title'],
                    'description'   => $request['description'],
                    'requirements'   => $request['requirements'],
                    'benefits'   => $request['benefits'],
                    'salary' => ($request['salary'] && $request['salary'] !== "R$ 0,00")
                        ? $request['salary']
                        : 'A Combinar',
                    'type'          => $request['type'],
                    'address'       => $request['address'],
                    'email_contact' => $request['email_contact'],
                ]);
                return redirect()
                    ->route('company.create-job') // ou outra rota que você queira
                    ->with('success', 'Vaga criada com sucesso!');
            } catch (\Throwable $error) {
                // Em produção, você pode querer logar ao invés de dd()
                return back()->withErrors(['error' => 'Erro ao criar a vaga: ' . $error->getMessage()]);
            }
        }
    }
}