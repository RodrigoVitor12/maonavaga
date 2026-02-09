<?php

namespace App\Livewire;

use App\Models\scheduleInterview;
use App\Models\ScheduleInterview as ModelsScheduleInterview;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardCompany extends Component
{   
    public $candidates;
    public $vacancies;

    public $interview;

    public function mount() {
        $this->interview = scheduleInterview::where('user_id', Auth::id())->get();
        $user = Auth::user();
        $this->candidates = $user->allApplies();
        $this->vacancies = $user->vacanciesWithCandidacyCount();
    }

    public function render()
    {
        return view('livewire.dashboard-company');
    }

    public function stop($id) {
        ScheduleInterview::where('vacancy_id', $id)->delete();
        $vacancy = Vacancy::find($id);

        $vacancy->update([
            'status' => 'Encerrado'
        ]);
        
        $this->vacancies = Auth::user()->vacanciesWithCandidacyCount();
        $this->candidates = Auth::user()->allApplies();
    }

    public function reopen ($id) {
        $vacancy = Vacancy::find($id);

        $vacancy->update([
            'status' => 'Ativo'
        ]);

        $this->vacancies = Auth::user()->vacanciesWithCandidacyCount();
        $this->candidates = Auth::user()->allApplies();
    }

    public function delete($id) {
        Vacancy::destroy($id);
               
        $this->vacancies = Auth::user()->vacanciesWithCandidacyCount();
        $this->candidates = Auth::user()->allApplies();
    }

    public function deleteInterview($id) {
        ScheduleInterview::destroy($id);
        $this->interview = scheduleInterview::where('user_id', Auth::id())->get();
    }
}