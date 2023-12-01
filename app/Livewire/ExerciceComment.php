<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;

class ExerciceComment extends Component
{
    public $comment;
    public $avatar;
    public $username;
    public $body;
    public $publishedDate;
    public $exerciceUserId;

    #[On('commentWasUpdated')]
    public function commentWasUpdated()
    {
        $this->comment->refresh();
    }

    public function mount(Comment $comment, $exerciceUserId){
        $this->comment = $comment;
        $this->avatar = $this->comment->user->getAvatar();
        $this->username = $this->comment->user->name;
        $this->body = $this->comment->body;
        $this->publishedDate = $this->comment->created_at;
        $this->exerciceUserId = $exerciceUserId;
    }



    public function render()
    {
        return view('livewire.exercice-comment');
    }
}
