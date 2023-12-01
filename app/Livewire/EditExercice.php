<?php

namespace App\Livewire;

use App\Models\Language;
use App\Models\Exercice;
use Illuminate\Http\Response;
use Livewire\Component;

class EditExercice extends Component
{

    public $languages;
    public $exercice;
    public $title;
    public $Language;
    public $description;

    protected $rules = [
        'title' => "required|min:4",
        'Language' => "required|integer|exists:languages,id",
        'description' => "required|min:4",
    ];

    public function mount(Exercice $exercice)
    {
        $this->languages = Language::All();
        $this->exercice = $exercice;
        $this->title = $exercice->title;
        $this->Language = $exercice->Language_id;
        $this->description = $exercice->description;
    }

    public function editExercice()
    {
        if (!auth()->check() || auth()->user()->cannot('update', $this->Exercice)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $this->Exercice->update([
            'title' => $this->title,
            'Language_id' => $this->Language,
            'description' => $this->description,
        ]);

        $this->Exercice->save();
        $this->dispatch('ExerciceWasUpdated', 'Exercice was updated successfully');
    }

    public function render()
    {
        return view('livewire.edit-exercice');
    }
}
