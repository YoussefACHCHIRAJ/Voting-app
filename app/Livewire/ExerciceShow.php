<?php

namespace App\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Models\Exercice;
use Livewire\Attributes\On;
use Livewire\Component;

class ExerciceShow extends Component
{

    public $exercice;
    public $votesCount;
    public $hasVoted;


    public function mount(Exercice $exercice, $votesCount)
    {
        $this->exercice = $exercice;
        $this->votesCount = $votesCount;
        $this->hasVoted = $exercice->isExerciceVotedByUser(auth()->user());
    }

    #[On('moduleWasUpdated')]
    public function moduleWasUpdated(){
        $this->exercice->refresh();
    }

    #[On('ExerciceWasUpdated')]
    public function ExerciceWasUpdated(){
        $this->exercice->refresh();
    }

    #[On('exerciceWasMarkedAsSpam')]
    public function ExerciceWasMarkedAsSpam(){
        $this->exercice->refresh();
    }
    #[On('commentWasAdded')]
    public function commentWasAdded(){
        $this->exercice->refresh();
    }
    public function vote()
    {

        if (!auth()->check()) return redirect(route('login'));

        if ($this->hasVoted) {
            try{
                $this->exercice->removeVote(auth()->user());
            }catch(VoteNotFoundException $e){
                // do noting
            }
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            try{
                $this->exercice->vote(auth()->user());
            }catch(DuplicateVoteException $e){
                // do noting
            }
            $this->votesCount++;
            $this->hasVoted = true;
        }
    }


    public function render()
    {
        return view('livewire.exercice-show');
    }
}
