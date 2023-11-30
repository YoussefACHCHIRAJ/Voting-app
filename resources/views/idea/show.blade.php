<x-app-layout>
    <div>
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                className="w-6 h-6">
                <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

            <span class="ml-2">All ideas (or back to chosen category with filters)</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" :commentsCount="$commentsCount" />

    <x-notification-success />

    @can('update', $idea)
        <livewire:edit-idea :idea="$idea" />
    @endcan
    @can('delete', $idea)
        <livewire:delete-idea :idea="$idea" />
    @endcan

    <livewire:mark-idea-as-spam :idea="$idea" />

    <livewire:idea-comments :idea="$idea" />
</x-app-layout>
