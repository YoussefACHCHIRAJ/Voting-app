<?php

namespace App\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Models\Exercice;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

class ExerciceIndex extends Component
{

    public $exercice;
    public $votesCount;
    public $hasVoted;

    public function mount(Exercice $exercice)
    {
        $this->exercice = $exercice;
        $this->votesCount = $exercice->votes_count;
        $this->hasVoted = $exercice->voted_by_user;
    }

    public function vote()
    {

        if (auth()->guest()) return redirect(route('login'));

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
        return view('livewire.exercice-index');
    }
}
