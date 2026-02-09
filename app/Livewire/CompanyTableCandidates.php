<?php

namespace App\Livewire;

use App\Models\Apply;
use App\Models\ScheduleInterview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyTableCandidates extends Component
{
    public $candidates;
    public $open = [];
    public $isOpenModal = false;

    public $date;
    public $time;
    public $location;
    public $notes;
    public $type;

    public $selectedCandidateId;
    public $vacancyId;

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

    public function openAndCloseModal($selectedCandidateId = null, $vacancyId = null) {
        $this->isOpenModal = !$this->isOpenModal;
        $this->selectedCandidateId = $selectedCandidateId;
        $this->vacancyId = $vacancyId;
    }

    public function scheduleInterview() {

    // 1️⃣ validação dos campos
        $this->validate([
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string',
            'type' => 'required|in:local,Online',
            'notes' => 'nullable|string',
        ], [
            'date.required' => 'Por favor, preencha a data da entrevista.',
            'time.required' => 'Por favor, preencha o horário.',
            'location.required' => 'Por favor, preencha o local ou link.',
            'type.required' => 'Por favor, escolha o tipo de entrevista.',
        ]);

        ScheduleInterview::create([
            'date' => $this->date,
            'time' => $this->time,
            'location' => $this->location,
            'notes' => $this->notes,
            'type' => $this->type,
            'candidate_id' => $this->selectedCandidateId,
            'vacancy_id' => $this->vacancyId,
            'user_id' => Auth::id()
        ]);

        $this->reset(['date', 'time', 'location', 'notes', 'type', 'selectedCandidateId', 'vacancyId']);
        session()->flash('message', 'Entrevista agendada com sucesso!');
        $this->isOpenModal = false;
    }

    public function handleClick($candidateId, $vacancyId, $status) {
        $this->scheduleInterview();
        $this->changeStatus($candidateId, $vacancyId, $status);
    }

    public function render()
    {
        return view('livewire.company-table-candidates');
    }
}