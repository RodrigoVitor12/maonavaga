<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResumeForm extends Component
{   
    public $resume;
    // Dados pessoais
    public $full_name;
    public $email;
    public $phone;
    public $city;
    public $birth_date;

    // Profissional
    public $summary;
    public $desired_job_type;
    public $availability;
    public $salary_expectation;

    public $skills;
    public $languages;

    // Arrays dinâmicos
    public $experiences = [];
    public $educations = [];

    public function mount()
    {
        $this->email = Auth::user()->email ?? null;
        $this->resume = Auth::user()->resume;

        $this->experiences = [
            [
                'position' => '',
                'company' => '',
                'start_date' => '',
                'end_date' => '',
                'currently_working' => false,
                'activities' => ''
            ]
        ];

        $this->educations = [
            [
                'course_type' => '',
                'institution' => '',
                'status' => ''
            ]
        ];
        if ($this->resume) {

        // Preenche campos simples
        $this->full_name = $this->resume->full_name;
        $this->email = $this->resume->email;
        $this->phone = $this->resume->phone;
        $this->city = $this->resume->city;
        $this->birth_date = $this->resume->birth_date;
        $this->summary = $this->resume->summary;
        $this->skills = $this->resume->skills;
        $this->languages = $this->resume->languages;

        // Preenche experiências
        $this->experiences = $this->resume->experiences->toArray();

        // Preenche formações
        $this->educations = $this->resume->educations->toArray();
    }
    }

    protected function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'birth_date' => 'nullable|date',

            'summary' => 'required|string|min:10',

            'desired_job_type' => 'nullable|string',
            'availability' => 'nullable|string',
            'salary_expectation' => 'nullable|numeric',

            'skills' => 'nullable|string',
            'languages' => 'nullable|string',

            'experiences.*.position' => 'nullable|string|max:255',
            'experiences.*.company' => 'nullable|string|max:255',
            'experiences.*.start_date' => 'nullable|date',
            'experiences.*.end_date' => 'nullable|date',
            'experiences.*.activities' => 'nullable|string',

            'educations.*.course_type' => 'nullable|string|max:255',
            'educations.*.institution' => 'nullable|string|max:255',
            'educations.*.status' => 'nullable|string|max:255',
        ];
    }

    // ================================
    // EXPERIÊNCIAS
    // ================================

    public function addExperience()
    {
        $this->experiences[] = [
            'position' => '',
            'company' => '',
            'start_date' => '',
            'end_date' => '',
            'currently_working' => false,
            'activities' => ''
        ];
    }

    public function removeExperience($index)
    {
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }

    // ================================
    // FORMAÇÕES
    // ================================

    public function addEducation()
    {
        $this->educations[] = [
            'course_type' => '',
            'institution' => '',
            'status' => ''
        ];
    }

    public function removeEducation($index)
    {
        unset($this->educations[$index]);
        $this->educations = array_values($this->educations);
    }

    // ================================
    // SALVAR
    // ================================

    public function save()
    {
    $this->validate();

    try {

        DB::beginTransaction();

        // Se quiser permitir apenas 1 currículo por usuário
        $existingResume = Resume::where('user_id', Auth::id())->first();

        if ($existingResume) {
            $existingResume->delete();
        }

        $resume = Resume::create([
            'user_id' => Auth::id(),
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'birth_date' => $this->birth_date,
            'summary' => $this->summary,
            'desired_job_type' => $this->desired_job_type,
            'availability' => $this->availability,
            'salary_expectation' => $this->salary_expectation,
            'skills' => $this->skills,
            'languages' => $this->languages,
        ]);

        // Salvar experiências
        foreach ($this->experiences as $experience) {

            if (!empty($experience['position']) || !empty($experience['company'])) {

                $resume->experiences()->create([
                    'position' => $experience['position'],
                    'company' => $experience['company'],
                    'start_date' => $experience['start_date'] ?: null,
                    'end_date' => $experience['end_date'] ?: null,
                    'currently_working' => $experience['currently_working'] ?? false,
                    'activities' => $experience['activities'],
                ]);
            }
        }

        // Salvar formações
        foreach ($this->educations as $education) {

            if (!empty($education['institution'])) {

                $resume->educations()->create([
                    'course_type' => $education['course_type'],
                    'institution' => $education['institution'],
                    'status' => $education['status'],
                ]);
            }
        }

        DB::commit();

        session()->flash('success', 'Currículo salvo com sucesso!');

        return redirect()->route('dashboard');

        } catch (\Throwable $e) {

            DB::rollBack();

            session()->flash('error', 'Erro ao salvar currículo.');

            return;
        }
    }

    public function render()
    {
        return view('livewire.resume-form');
    }
}