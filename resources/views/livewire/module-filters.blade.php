<nav class="hidden md:flex items-center justify-between text-xs text-gray-400">
    <ul class="flex uppercase border-b-4 pb-3 font-semibold space-x-10">
        <li><a wire:click.prevent="setModule('All')" href="#"
                class="{{ $module === 'All' ? 'border-blue text-gray-900' : '' }} border-b-4 pb-3 hover:border-blue">
                All Exercices ({{ $moduleCount['all_modules'] }})</a></li>
        <li><a wire:click.prevent="setModule('DATABASE')" href="#"
                class="{{ $module === 'DATABASE' ? 'border-blue text-gray-900' : '' }} capitalize transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">
                database ({{ $moduleCount['db'] }})</a></li>
        <li><a wire:click.prevent="setModule('JAVA OOP')" href="#"
                class="{{ $module === 'JAVA OOP' ? 'border-blue text-gray-900' : '' }} capitalize transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">
                java oop ({{ $moduleCount['java_oop'] }})</a></li>
        <li><a wire:click.prevent="setModule('SCRIPT BASH')" href="#"
                class="{{ $module === 'SCRIPT BASH' ? 'border-blue text-gray-900' : '' }} capitalize transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">
                script bash ({{ $moduleCount['sh'] }})</a></li>

        <li><a wire:click.prevent="setModule('WEB')" href="#"
                class="{{ $module === 'WEB' ? 'border-blue text-gray-900' : '' }} capitalize transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">
                web ({{ $moduleCount['web'] }})</a></li>
    </ul>

</nav>
