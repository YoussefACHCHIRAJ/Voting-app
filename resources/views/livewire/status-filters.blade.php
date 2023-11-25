<nav class="hidden md:flex items-center justify-between text-xs text-gray-400">
    <ul class="flex uppercase border-b-4 pb-3 font-semibold space-x-10">
        <li><a wire:click.prevent="setStatus('All')" href="#"
                class="{{ $status === 'All' ? 'border-blue text-gray-900' : '' }} border-b-4 pb-3 hover:border-blue">All
                Ideas ({{ $statusCount['all_status'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Considering')" href="#"
                class="{{ $status === 'Considering' ? 'border-blue text-gray-900' : '' }} transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Considering
                ({{ $statusCount['considering'] }})</a></li>
        <li><a wire:click.prevent="setStatus('In progress')" href="#"
                class="{{ $status === 'In progress' ? 'border-blue text-gray-900' : '' }} transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">In
                progress ({{ $statusCount['in_progress'] }})</a></li>
    </ul>
    <ul class="flex uppercase border-b-4 pb-3 font-semibold space-x-10">
        <li><a wire:click.prevent="setStatus('Implemented')" href="#"
                class="{{ $status === 'Implemented' ? 'border-blue text-gray-900' : '' }} transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Implemented
                ({{ $statusCount['implemented'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="#"
                class="{{ $status === 'Closed' ? 'border-blue text-gray-900' : '' }} transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Closed
                ({{ $statusCount['closed'] }})</a></li>
    </ul>
</nav>
