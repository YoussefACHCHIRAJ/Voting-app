<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteComment extends Component
{

    public Comment $comment;

    #[On('showing-delete-comment-modal')]
    public function setCommentToDelete($commentId){
        $this->comment = Comment::findOrFail($commentId);
    }

    public function deleteComment(){
        Comment::destroy($this->comment->id);
        $this->dispatch('commentWasDeleted', 'Your Comment has been deleted.');



    }


    public function render()
    {
        return view('livewire.delete-comment');
    }
}
