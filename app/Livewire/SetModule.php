<?php

namespace App\Livewire;

use App\Models\Exercice;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SetModule extends Component
{

    public $exercice;
    public $module;

    public function mount(Exercice $exercice){
        $this->exercice = $exercice;
        $this->module = $this->exercice->module_id;
    }

    public function setModule(){
        if(!auth()->check() || !auth()->user()->isAdmin()){
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->exercice->module_id = $this->module;
        $this->exercice->save();


        $this->dispatch('moduleWasUpdated', 'module has been changed to '. $this->exercice->module->name);
    }

    public function render()
    {
        return view('livewire.set-module');
    }
}
