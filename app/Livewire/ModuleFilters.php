<?php

namespace App\Livewire;

use App\Models\Exercice;
use App\Models\Module;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Url;
use Livewire\Component;

class ModuleFilters extends Component
{

    #[Url(keep: true)]
    public $module;
    public $moduleCount;


    public function mount()
    {
        $this->moduleCount = Module::getCounts();
        $this->module = request()->module ?? 'All';

        if (Route::currentRouteName() === "module.show") {
            $this->module = null;
        }
    }
    public function setModule($newModule)
    {
        $this->module = $newModule;
        $this->dispatch('queryStringUpdateModule', newModule: $newModule);
        if( $this->getPreviousRouteName() === 'exercice.show' || $this->getPreviousRouteName() === 'exercice.create')
            return redirect()->route('exercice.index', ['module' => $this->module]);
    }

    public function render()
    {
        return view('livewire.module-filters');
    }

    private function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }
}
