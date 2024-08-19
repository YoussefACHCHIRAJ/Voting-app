<div>
    <div class="filters space-y-3 md:space-y-0 md:space-x-3 flex flex-col md:flex-row">
        <div class="w-full md:w-1/3">
            <select wire:model.live="language" name="language" id="language"
                class="w-full text-xs rounded-xl px-4 py-2 border-none">
                <option value="All">All Languages</option>
                @foreach ($languages as $language)
                    <option value="{{ $language->name }}">{{ $language->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select wire:model.live="filters" name="othe_filterso" id="othe_filterso"
                class="w-full  text-xs rounded-xl px-4 py-2 border-none">
                <option value="No filters">No filters</option>
                <option value="Top voted">Top voted</option>
                @admin
                    <option value="Spam exercice">Spam exercices</option>
                @endadmin
            </select>
        </div>
        <div class="w-full md:w2/3 relative">
            <input wire:model.live='search' type="text" placeholder="Find an exercice"
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
    <div class="exercices-container space-y-6 my-6">
        @forelse ($exercices as $exercice)
            <livewire:exercice-index :key="$exercice->id" :exercice="$exercice" />
        @empty
            <div class="mx-auto w-70 mt-12 space-y-3 text-center    ">
                <img src="{{ asset('images/no-exercices.svg') }}" alt="No exercices" class="mx-auto mix-blend-luminosity">
                <p class="text-gray-400 font-bold">No exercices were found...</p>
                <p class="text-gray-400 font-bold">Pleaze Come back later</p>
            </div>
        @endforelse
    </div> <!-- end exercices container -->
    <div class="my-2">
        {{-- {{ $exercices->links() }} --}}
        {{ $exercices->appends(request()->query())->links() }}
    </div>

</div>
