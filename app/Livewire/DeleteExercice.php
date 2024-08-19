<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Exercice;
use App\Models\Vote;
use Illuminate\Http\Response;
use Livewire\Component;

class DeleteExercice extends Component
{

    public $exercice;

    public function mount(Exercice $exercice)
    {
        $this->exercice = $exercice;
    }

    public function deleteExercice(){

        if(auth()->guest() || auth()->user()->cannot('delete', $this->exercice)){
            abort(Response::HTTP_FORBIDDEN);
        }

        Vote::where('exercice_id', $this->exercice->id)->delete();
        Comment::where('exercice_id', $this->exercice->id)->delete();
        Exercice::destroy($this->exercice->id);

        return redirect()->route('exercice.index')->with('success_message', 'The Exercice was deleted sucessfuly.');
    }


    public function render()
    {
        return view('livewire.delete-exercice');
    }
}
