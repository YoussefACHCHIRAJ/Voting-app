<x-app-layout>
    <div class="filters space-x-6 flex">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="category One">Category One</option>
                <option value="category Two">Category Two</option>
                <option value="category Three">Category Three</option>
                <option value="category Four">Category Four</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="othe_filterso" id="othe_filterso" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>
        <div class="w2/3 relative">
            <input type="text" placeholder="Find an idea" class="w-full rounded-xl px-4 py-2 pl-8 border-none placeholder:text-gray-900">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 h-4 text-gray-700" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>

    </div>

</x-app-layout>
