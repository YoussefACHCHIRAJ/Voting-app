<div>
    <div class="filters space-y-3 md:space-y-0 md:space-x-3 flex flex-col md:flex-row">
        <div class="w-full md:w-1/3">
            <select wire:model.live="category" name="category" id="category"
                class="w-full text-xs rounded-xl px-4 py-2 border-none">
                <option value="All">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select wire:model.live="filters" name="othe_filterso" id="othe_filterso"
                class="w-full  text-xs rounded-xl px-4 py-2 border-none">
                <option value="No filters">No filters</option>
                <option value="Top voted">Top voted</option>
                <option value="My ideas">My ideas</option>
                @admin
                    <option value="Spam idea">Spam ideas</option>
                @endadmin
            </select>
        </div>
        <div class="w-full md:w2/3 relative">
            <input wire:model.live='search' type="text" placeholder="Find an idea"
                class="w-full text-xs rounded-xl px-4 py-2 pl-8 border-none placeholder:text-gray-900">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 h-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->
    <div class="ideas-container space-y-6 my-6">
        @forelse ($ideas as $idea)
            <livewire:idea-index :key="$idea->id" :idea="$idea" />
        @empty
            <div class="mx-auto w-70 mt-12 space-y-3">
                <p class="text-gray-400 font-bold">No ideas were found...</p>
                <p class="text-gray-400 font-bold">Pleaze Come back later</p>
            </div>
        @endforelse
    </div> <!-- end ideas container -->
    <div class="my-2">
        {{-- {{ $ideas->links() }} --}}
        {{ $ideas->appends(request()->query())->links() }}
    </div>

</div>
