<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class AddComment extends Component
{

    public $idea_id;
    public $user_id;
    public $body = '';

    protected $rules=[
        'body' => 'required|min:4'
    ];


    public function mount(Idea $idea){
        $this->idea_id = $idea->id;
        $this->user_id = auth()->id();
    }

    public function addComment(){

        if(auth()->guest()) abort(Response::HTTP_FORBIDDEN);

        $this->validate();
        Comment::create($this->all());
        // the property does not reset proprlly fix later
        $this->reset('body');
        $this->dispatch('commentWasAdded', 'Your comment has been added.');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
