<div>
    @if ($comments->isNotEmpty())

        <div class="comments-container relative space-y-6 md:ml-22 my-8 pt-4 mt-1">
            @foreach ($comments as $comment)
                <livewire:idea-comment :key="$comment->id" :comment="$comment" :ideaUserIdea="$ideaUserIdea"/>
            @endforeach
        </div>
        <div class="my-6 ml-22">
            {{ $comments->onEachSide(0)->links() }}
        </div>
    @else
        <div class="mx-auto w-70 mt-12">
            <img src="{{ asset('images/no-ideas.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity">
            <div class="text-gray-400 text-center font-bold mt-6">No comments yet...</div>
        </div>
    @endif
</div>
