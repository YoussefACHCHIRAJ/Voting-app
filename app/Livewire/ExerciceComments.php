<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ExerciceComments extends Component
{
    use WithPagination;

    public $exercice;

    public function mount($exercice){
        $this->exercice = $exercice;
    }

    #[On('commentWasAdded')]
    public function commentWasAdded()
    {
        $this->exercice->refresh();
        $this->gotoPage($this->exercice->comments()->paginate()->lastpage());
    }

    #[On('commentWasDeleted')]
    public function commentWasDeleted()
    {
        $this->exercice->refresh();
        $this->resetPage();
    }
    

    public function render()
    {
        return view('livewire.exercice-comments')->with([
            'comments' => Comment::with('user')->where('exercice_id', $this->exercice->id)->paginate(),
            'exerciceUserId' => $this->exercice->user->id
        ]);
    }
}
