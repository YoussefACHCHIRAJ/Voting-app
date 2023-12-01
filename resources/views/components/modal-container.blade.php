@can('update', $exercice)
    <livewire:edit-exercice :exercice="$exercice" />
@endcan

@can('delete', $exercice)
    <livewire:delete-exercice :exercice="$exercice" />
@endcan

<livewire:mark-exercice-as-spam :exercice="$exercice" />


<livewire:edit-comment />

<livewire:delete-comment />
