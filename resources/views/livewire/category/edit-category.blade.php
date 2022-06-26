<x-modal form-action="save">
    <x-slot name="title">
        {{__('Category Edit')}}
    </x-slot>

    <x-slot name="subtitle">
        {{__('Edit podcast category')}}
    </x-slot>

    <x-slot name="content">
        <dl>
            <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 items-center">
                <dt class="text-sm font-medium text-gray-500">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2"/>

                </dd>
                <dt class="text-sm font-medium text-gray-500">
                    {{__(' Thumbnail')}}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                <img src="{{$thumbnail_photo}}"
                class="w-10 h-10 rounded-lg object-contain object-center"/>

                </dd>
                <dt class="text-sm font-medium text-gray-500">
                <x-jet-label for="status" value="{{ __('Status') }}" />
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                <x-select_input class="w-full" :options="$statuses" key="name" value="name"
                wire:model="status"></x-select_input>
                <x-jet-input-error for="status" class="mt-2"/>

                </dd>
            </div>


        </dl>
    </x-slot>

    <x-slot name="buttons">

        <button wire:click="$emit('store')" type="button" class="py-2 px-4 flex justify-center items-center bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-auto transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2">
            {{ __('Update') }}
        </button>
    </x-slot>

</x-modal>