<x-mail::message>

# Idea status updated

the idea : {{ $idea->title }}

has been updated to status of:

{{ $idea->status->name }}

<x-mail::button :url="{{ route('idea.show', $idea) }}">
View Idea
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
