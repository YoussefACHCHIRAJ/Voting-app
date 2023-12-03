<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Exercice;
use Illuminate\Http\Response;
use Livewire\Component;

class AddComment extends Component
{

    public $exercice_id;
    public $user_id;
    public $body = '';

    protected $rules=[
        'body' => 'required|min:4'
    ];


    public function mount(Exercice $exercice){
        $this->exercice_id = $exercice->id;
        $this->user_id = auth()->id();
    }

    public function addComment(){

        if(auth()->guest()) abort(Response::HTTP_FORBIDDEN);

        $this->validate();
        Comment::create($this->all());
        $this->reset('body');
        $this->dispatch('commentWasAdded', 'Your comment has been added.');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
