<?php

namespace App\Livewire;

use App\Models\Language;
use App\Models\Exercice;
use App\Models\Module;
use App\Models\Vote;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ExercicesIndex extends Component
{
    use WithPagination;

    public $module;

    #[Url(keep: true)]
    public $language;

    #[Url(keep: true)]
    public $filters;

    #[Url(keep: true)]
    public $search = '';

    protected $queryString =  ['module', 'language', 'filters', 'search'];



    public function mount()
    {
        $this->module = request()->module ?? 'All';
    }

    public function updatedLanguage()
    {
        $this->resetPage();
    }

    #[On('queryStringUpdateModule')]
    public function queryStringUpdateModule($newModule)
    {
        $this->module = $newModule;
        $this->resetPage();
    }




    public function render()
    {
        $modules = Module::all()->pluck('id', 'name');
        $languages = Language::all();
        return view('livewire.exercices-index')->with([
            'exercices' => Exercice::with('user', 'language', 'module')
                ->when($this->module && $this->module !== 'All', function ($query) use ($modules) {
                    return $query->where('module_id', $modules->get($this->module));
                })->when($this->language && $this->language !== 'All', function ($query) use ($languages) {
                    return $query->where('language_id', $languages->pluck('id', 'name')->get($this->language));
                })->when($this->filters && $this->filters === 'Top voted', function ($query) {
                    return $query->orderByDesc('votes_count');
                })->when($this->filters && $this->filters === 'Spam Exercice', function ($query) {
                    return $query->where('spam_reports' , '>', 0)->orderByDesc('spam_reports');
                })->when((strlen($this->search) > 3), function ($query) {
                    return $query->where('title', 'like', '%' . $this->search . '%');
                })->addSelect([
                    'voted_by_user' => Vote::select('id')
                        ->where('user_id', auth()->id())
                        ->whereColumn('exercice_id', 'exercices.id')
                ])->withCount('votes', 'comments')
                ->latest('id')
                ->simplePaginate(10),
            'languages' => $languages,
        ]);
    }
}
