<?php

namespace App\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Models\Idea;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

class IdeaIndex extends Component
{

    public $idea;
    public $votesCount;
    public $hasVoted;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->votesCount = $idea->votes_count;
        $this->hasVoted = $idea->voted_by_user;
    }

    public function vote()
    {

        if (!auth()->check()) $this->redirect(route('login'), navigate: true);
        if ($this->hasVoted) {
            try{
                $this->idea->removeVote(auth()->user());
            }catch(VoteNotFoundException $e){
                // do noting
            }
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            try{
                $this->idea->vote(auth()->user());
            }catch(DuplicateVoteException $e){
                // do noting
            }
            $this->votesCount++;
            $this->hasVoted = true;
        }

    }


    public function render()
    {
        return view('livewire.idea-index');
    }
}
