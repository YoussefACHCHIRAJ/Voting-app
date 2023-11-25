<?php

namespace App\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Url;
use Livewire\Component;

class StatusFilters extends Component
{

    #[Url(keep: true)]
    public $status;
    public $statusCount;


    public function mount()
    {
        $this->statusCount = Status::getCounts();
        $this->status = request()->status ?? 'All';

        if (Route::currentRouteName() === "idea.show") {
            $this->status = null;
        }
    }
    public function setStatus($newstatus)
    {
        $this->status = $newstatus;
        $this->dispatch('queryStringUpdateStatus', newStatus: $newstatus);
        if( $this->getPreviousRouteName() === 'idea.show')
            return redirect()->route('idea.index', ['status' => $this->status]);
    }

    public function render()
    {
        return view('livewire.status-filters');
    }

    private function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }
}
