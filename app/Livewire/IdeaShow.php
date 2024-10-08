<?php

namespace App\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Models\Idea;
use Livewire\Attributes\On;
use Livewire\Component;

class IdeaShow extends Component
{

    public $idea;
    public $votesCount;
    public $hasVoted;


    public function mount(Idea $idea, $votesCount)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->isIdeaVotedByUser(auth()->user());
    }

    #[On('statusWasUpdated')]
    public function statusWasUpdated(){
        $this->idea->refresh();
    }

    #[On('ideaWasUpdated')]
    public function ideaWasUpdated(){
        $this->idea->refresh();
    }

    #[On('ideaWasMarkedAsSpam')]
    public function ideaWasMarkedAsSpam(){
        $this->idea->refresh();
    }
    #[On('commentWasAdded')]
    public function commentWasAdded(){
        $this->idea->refresh();
    }
    public function vote()
    {

        if (!auth()->check()) return redirect(route('login'));

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
        return view('livewire.idea-show');
    }
}
