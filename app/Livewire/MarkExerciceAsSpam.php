<?php

namespace App\Livewire;

use App\Models\Exercice;
use Illuminate\Http\Response;
use Livewire\Component;

class MarkExerciceAsSpam extends Component
{

    public $exercice;

    public function mount(Exercice $exercice)
    {
        $this->exercice = $exercice;
    }

    public function markAsSpam(){
        if(auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->exercice->spam_reports++;

        $this->exercice->save();

        $this->dispatch("exerciceWasMarkedAsSpam", 'Exercice was marked as spam');
    }

    public function render()
    {
        return view('livewire.mark-exercice-as-spam');
    }
}
