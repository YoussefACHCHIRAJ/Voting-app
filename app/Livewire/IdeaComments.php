<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;

    public $idea;

    public function mount($idea){
        $this->idea = $idea;
    }

    #[On('commentWasAdded')]
    public function commentWasAdded()
    {
        $this->idea->refresh();
        $this->gotoPage($this->idea->comments()->paginate()->lastpage());
    }

    #[On('commentWasDeleted')]
    public function commentWasDeleted()
    {
        $this->idea->refresh();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.idea-comments', [
            'comments' => Comment::with('user')->where('idea_id', $this->idea->id)->paginate(),
            'ideaUserIdea' => $this->idea->user->id
        ]);
    }
}
