<x-modal form-action="save">
    <x-slot name="title">
        {{__('Podcast creation')}}
    </x-slot>

    <x-slot name="subtitle">
        {{__('create podcasts')}}
    </x-slot>

    <x-slot name="content">
        <dl>
            <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 items-center">
                <dt class="text-sm font-medium text-gray-500">
                    <x-jet-label for="pod_name" value="{{ __('Name') }} *" />
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                    <x-jet-input id="pod_name" type="text" class="mt-1 block w-full" wire:model="pod_name" />
                    <x-jet-input-error for="pod_name" class="mt-2" />
                </dd>
                <dt class="text-sm font-medium text-gray-500">
                    <x-jet-label for="category" value="{{ __('Category') }}  *" />
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                    <x-select_input class="w-full" :options="$categories" key="id" value="name" wire:model="category"></x-select_input>
                    <x-jet-input-error for="category" class="mt-2" />

                </dd>
                <dt class="text-sm font-medium text-gray-500">
                    <x-jet-label for="pod_url" value="{{ __('Media') }}  *" />

                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">

                    <input type="file" id="pod_url" accept=".mp3" wire:model="pod_url" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="pod_url">accept MP3 .</p>
                    <x-jet-input-error for="pod_url" class="mt-2" />


                </dd>
                <dt class="text-sm font-medium text-gray-500">
                    <x-jet-label for="pod_description" value="{{ __('Description') }}" />
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                    <textarea id="pod_description" class="mt-1 block w-full" wire:model="pod_description"></textarea>
                </dd>
                <dt class="text-sm font-medium text-gray-500">
                    <x-jet-label for="status" value="{{ __('Status') }}  *" />
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                    <x-select_input class="w-full" :options="$statuses" key="name" value="name" wire:model="status"></x-select_input>
                    <x-jet-input-error for="status" class="mt-2" />

                </dd>
            </div>


        </dl>
    </x-slot>

    <x-slot name="buttons">

        <button wire:click="$emit('store')" type="button" class="py-2 px-4 flex justify-center items-center bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-auto transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2">
            {{ __('Save') }}
        </button>
    </x-slot>

</x-modal>