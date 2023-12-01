<?php

namespace App\Livewire;

use App\Models\Exercice;
use App\Models\Language;
use Illuminate\Http\Response;
use Livewire\Component;

class CreateExercice extends Component
{
    public $title;
    public $category = 1;
    public $description;

    protected $rules = [
        'title' => "required|min:4",
        'category' => "required|integer|exists:categories,id",
        'description' => "required|min:4",
    ];

    public function createExercice(){
        if(!auth()->check()){
            return abort(Response::HTTP_FORBIDDEN);
        }
        $this->validate();
        Exercice::create([
            'user_id'=> auth()->id(),
            'exercice_id'=> $this->category,
            'module_id'=> 1,
            'title'=> $this->title,
            'description'=> $this->description,
            
        ]);

        return redirect()->route('exercice.index')->with('success_message', 'The Exercice was created sucessfuly.');
    }

    public function render()
    {
        return view('livewire.create-exercice', [
            'languages' => Language::all()
        ]);
    }
}
