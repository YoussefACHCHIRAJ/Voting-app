<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;

class MarkIdeaAsSpam extends Component
{

    // public $idea;

    // public function mount(Idea $idea)
    // {
    //     $this->idea = $idea;
    // }

    public function render()
    {
        return view('livewire.mark-idea-as-spam');
    }
}
