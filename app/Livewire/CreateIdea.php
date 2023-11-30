<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class CreateIdea extends Component
{
    public $title;
    public $category = 1;
    public $description;

    protected $rules = [
        'title' => "required|min:4",
        'category' => "required|integer|exists:categories,id",
        'description' => "required|min:4",
    ];

    public function createIdea(){
        if(!auth()->check()){
            return abort(Response::HTTP_FORBIDDEN);
        }
        $this->validate();
        Idea::create([
            'user_id'=> auth()->id(),
            'category_id'=> $this->category,
            'status_id'=> 1,
            'title'=> $this->title,
            'description'=> $this->description,
        ]);

        return redirect()->route('idea.index')->with('success_message', 'The idea was created sucessfuly.');
    }

    public function render()
    {
        return view('livewire.create-idea', [
            'categories' => Category::all()
        ]);
    }
}
