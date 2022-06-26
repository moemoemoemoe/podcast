<div wire:init="loadRecords" class="mt-2" style="padding:2em">
    <x-card>
        <x-slot name="header">

            <x-slot name="title">
                {{__('Podcasts List')}}
            </x-slot>
            <x-slot name="subtitle">
                {{__('show a list of all  podcasts ')}}
            </x-slot>

            <x-slot name="actions">
                <button onclick="Livewire.emit('openModal', 'podcast.create-podcast')" class="py-2 px-4 capitalize tracking-wide flex items-center p-2  transition ease-in duration-200 uppercase hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                    New Podcast
                </button>

            </x-slot>

            <x-slot name="body" class="items-center">
            @livewire('podcast.podcast-table')

            </x-slot>
    </x-card>
</div>