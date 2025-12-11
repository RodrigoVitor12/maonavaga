<?php

namespace App\Livewire;

use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyTableCandidates extends Component
{
    public $candidates;
    public $open = [];

    public function mount() {
        $this->candidates = Auth::user()->allMyCandidates()->with(['user', 'vacancy'])->get();
    }

    public function changeOpen($id)
    {
        $this->open[$id] = !($this->open[$id] ?? false);
    }

    public function changeStatus($candidateId, $vacancyId, $status)
    {
        $apply = Apply::where('user_id', $candidateId)
            ->where('vacancy_id', $vacancyId)
            ->first();

        $apply->update([
            'status' => $status
        ]);
        $this->candidates = Auth::user()->allMyCandidates()->with(['user', 'vacancy'])->get();
        $this->open = false;

    }

    public function render()
    {
        return view('livewire.company-table-candidates');
    }
}