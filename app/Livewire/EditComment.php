<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Http\Response;
use Livewire\Attributes\On;
use Livewire\Component;

class EditComment extends Component
{

    public Comment $comment;
    public $body = "";

    protected $rules = ['body' => 'required|min:4'];

    #[On('setEditComment')]
    public function setEditComment($commentId){

        $this->comment = Comment::findOrFail($commentId);

        $this->body = $this->comment->body;

        $this->dispatch('setCommentWasAdded');
    }

    public function editComment(){

        if(auth()->guest() || auth()->user()->cannot('update', $this->comment)) abort(Response::HTTP_FORBIDDEN);


        $this->validate();

        $this->comment->update($this->only('body'));

        $this->dispatch('commentWasUpdated', 'Your comment was updated successfully');
    }
    public function render()
    {
        return view('livewire.edit-comment');
    }
}
