<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class IdeaComments extends Component
{

    public $idea;

    public function mount($idea){
        $this->idea = $idea;
    }

    #[On('commentWasAdded')]
    public function commentWasAdded()
    {
        $this->idea->refresh();
    }

    public function render()
    {
        return view('livewire.idea-comments', [
            'comments' => $this->idea->comments,
            'ideaUserIdea' => $this->idea->user->id
        ]);
    }
}
