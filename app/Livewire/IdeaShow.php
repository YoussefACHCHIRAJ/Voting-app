<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{

    public $idea;
    public $votesCount;
    public $hasVoted;


    public function mount(Idea $idea, $votesCount){
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->isIdeaVotedByUser(auth()->user());
    }
    public function render()
    {
        return view('livewire.idea-show');
    }
}
