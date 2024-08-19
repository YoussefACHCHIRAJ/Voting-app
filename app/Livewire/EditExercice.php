<?php

namespace App\Livewire;

use App\Models\Language;
use App\Models\Exercice;
use App\Models\Module;
use Illuminate\Http\Response;
use Livewire\Component;

class EditExercice extends Component
{
    public $languages;
    public $modules;
    public $exercice;

    public $title;
    public $language_id;
    public $module_id;
    public $description;
    public $codeblock;

    protected $rules = [
        'title' => "required|min:4",
        'language_id' => "required|integer|exists:languages,id",
        'module_id' => "required|integer|exists:modules,id",
        'description' => "required|min:4",
        'codeblock' => "required|min:4",
    ];


    public function mount(Exercice $exercice)
    {

        $this->languages = Language::All();
        $this->modules = Module::All();
        $this->exercice = $exercice;
        $this->fill(
            $exercice->only(
                'title',
                'language_id',
                'module_id',
                'description',
                'codeblock'
            )
            );
    }

    public function editExercice()
    {
        if (!auth()->check() || auth()->user()->cannot('update', $this->exercice)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();
        $this->exercice->update($this->only([
            'title',
            'language_id',
            'module_id',
            'description',
            'codeblock'
        ]));
        $this->exercice->save();
        $this->dispatch('ExerciceWasUpdated', 'Exercice was updated successfully');
    }

    public function render()
    {
        return view('livewire.edit-exercice');
    }
}
