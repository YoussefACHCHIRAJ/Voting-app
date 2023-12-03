<?php

namespace App\Livewire;

use App\Models\Exercice;
use App\Models\Language;
use App\Models\Module;
use Illuminate\Http\Response;

use Livewire\Component;


class CreateExercice extends Component
{
    public $title;
    public $user_id;
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

    public function mount(){
        $this->user_id = auth()->id();
        $this->language_id = 1;
        $this->module_id = 1;
    }

    public function createExercice(){
        if(!auth()->check()){
            return abort(Response::HTTP_FORBIDDEN);
        }
        $this->validate();
        Exercice::create($this->all());

        return redirect()->route('exercice.index')->with('success_message', 'The Exercice was created sucessfuly.');
    }

    public function render()
    {
        return view('livewire.create-exercice')->layout('layouts.app')->with([
            'languages' => Language::all(),
            'modules' => Module::all()
        ]);
    }
}
