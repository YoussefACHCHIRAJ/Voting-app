<div class="w-full md:mx-auto">
    <div class="border-2 rounded-xl border-gradient bg-white md:sticky  mx-auto w-full md:w-175">
        <div class="text-center px-6 py-2 pt-6">
            <h3 class="font-semibold text-base">Add an Exercice</h3>
            <p class="text-xs mt-4">
                Let us known what you would like and we'll take a look over!</p>
        </div>
        <form wire:submit.prevent="createExercice" method="POST" class="space-y-4 px-4 py-6 ">

            <div>
                <input type="text" wire:model.defer="title"
                    class="w-full bg-gray-100 text-sm rounded-xl placeholder:text-gray-900 px-4 py-2 border-none"
                    placeholder="Your exercice">
                @error('title')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <select wire:model.defer="language_id" name="language_add" id="language_add"
                    class="w-full bg-gray-100 text-sm rounded-xl px-4 py-2 border-none">
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
                @error('language')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <select wire:model.defer="module_id" name="module" id="module"
                    class="w-full bg-gray-100 text-sm rounded-xl px-4 py-2 border-none lowercase">
                    @foreach ($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                    @endforeach
                </select>
                @error('module')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <textarea wire:model.defer="description" name="exercice" id="exercice" cols="30" rows="4"
                    class="w-full bg-gray-100 rounded-xl placeholder:text-gray-900 text-sm px-4 py-2 border-none"
                    placeholder="Describe your exercice"></textarea>
                @error('description')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <textarea wire:model.defer="codeblock" name="codeblock" id="codeblock" cols="30" rows="4"
                    class="w-full bg-gray-100 rounded-xl placeholder:text-gray-900 text-sm px-4 py-2 border-none"
                    placeholder="code of your exercice"></textarea>
                @error('codeblock')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between space-x-3">
                <button type="button" @click="isOpen=false"
                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border borde-gray-100 hover:border-gray-400 transition duration-150 px-6 py-3 ease-in">

                    <span class="ml-1">cancel</span>
                </button>
                <button type="submit"
                    class="w-1/2 h-11 text-xs text-white bg-blue font-semibold rounded-xl border bordeblue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">
                    <span class="ml-1">Submit</span>
                </button>
            </div>
            <div>

            </div>
        </form>
    </div>
</div>
