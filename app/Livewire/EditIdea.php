<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class EditIdea extends Component
{

    public $categories;
    public $idea;
    public $title;
    public $category;
    public $description;

    protected $rules = [
        'title' => "required|min:4",
        'category' => "required|integer|exists:categories,id",
        'description' => "required|min:4",
    ];

    public function mount(Idea $idea)
    {
        $this->categories = Category::All();
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->category = $idea->category_id;
        $this->description = $idea->description;
    }

    public function editIdea()
    {
        if (!auth()->check() || auth()->user()->cannot('update', $this->idea)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $this->idea->update([
            'title' => $this->title,
            'category_id' => $this->category,
            'description' => $this->description,
        ]);

        $this->idea->save();
        $this->dispatch('ideaWasUpdated');
    }

    public function render()
    {
        return view('livewire.edit-idea');
    }
}