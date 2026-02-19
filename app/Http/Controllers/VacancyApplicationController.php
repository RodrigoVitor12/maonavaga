<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Resume;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;

class VacancyApplicationController extends Controller
{
    function apply($id)
    {
        $vacancy = Vacancy::find($id, ['id']);

        try {
            // Verify if user already applied
            $isRepeatApply = Apply::where('user_id', Auth::id())->where('vacancy_id', $id)->get();
            if ($isRepeatApply->count() > 0) {
                return redirect()
                    ->route('vacancies.show')
                    ->with('success', 'Você já se candidatou a essa vaga');
            }

            //Verificar se user tem curriculo
            $hasResume = Resume::where('user_id', Auth::id())->count();
            if($hasResume > 0) {
                Apply::create([
                    'user_id' => Auth::id(),
                    'vacancy_id' => $vacancy->id,
                ]);
            } else {
                return redirect()
                    ->route('vacancies.show')
                    ->with('success', 'Para se candidatar a está vaga, você precisa criar um Curriculo');
            }

            return redirect()
                    ->route('vacancies.show')
                    ->with('success', 'Candidatura enviado com sucesso');
        } catch (\Throwable $error) {
            return back()->withErrors(['error' => 'Erro ao se candidatar: ' . $error->getMessage()]);
        }
    }
}