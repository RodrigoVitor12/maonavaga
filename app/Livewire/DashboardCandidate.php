<?php

namespace App\Livewire;

use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardCandidate extends Component
{
    public $myCandidacies;
    public $applies;

    public function mount() {
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