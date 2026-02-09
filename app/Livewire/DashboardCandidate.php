<?php

namespace App\Livewire;

use App\Models\Apply;
use App\Models\ScheduleInterview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardCandidate extends Component
{
    public $myCandidacies;
    public $applies;

    public $interviews;

    public function mount() {
        $this->interviews = ScheduleInterview::where('candidate_id', Auth::id())->get();
        $user = Auth::user();
        $this->myCandidacies = $user->allMyCandidacies()
        ->load(['applies' => function ($query) {
            $query->where('user_id', Auth::id());
        }]);

    }
    
    public function render()
    {
        return view('livewire.dashboard-candidate');
    }

    public function destroy($id) {
         Apply::where('user_id', Auth::id())
            ->where('vacancy_id', $id)
            ->delete();

        $this->myCandidacies = Auth::user()
            ->allMyCandidacies()
            ->load(['applies' => function ($query) {
                $query->where('user_id', Auth::id());
            }]);
    }   
}