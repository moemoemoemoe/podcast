<x-modal form-action="save">
    <x-slot name="title">
        {{__('Category creation')}}
    </x-slot>

    <x-slot name="subtitle">
        {{__('create podcast category')}}
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
                <div x-data="{thumbnailImageName: null, thumbnailImagePreview: null}" class="col-span-6 sm:col-span-4">
                <!-- thumbnail Photo File Input -->
                <input type="file" class="hidden" wire:model="thumbnail_photo" x-ref="thumbnail_photo" x-on:change="
                                    thumbnailImageName = $refs.thumbnail_photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        thumbnailImagePreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.thumbnail_photo.files[0]);
                            "/>

                <x-jet-label for="thumbnail_photo" value="{{ __('thumbnail image') }}"/>

                <div class="mt-2" x-show="! thumbnailImagePreview">
                    <div class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center bg-gray-100"></div>
                </div>

                <!-- New thumbnail Photo Preview -->
                <div class="mt-2" x-show="thumbnailImagePreview">
                    <div class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                         x-bind:style="'background-image: url(\'' + thumbnailImagePreview + '\');'">
                    </div>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button"
                                        x-on:click.prevent="$refs.thumbnail_photo.click()">
                    {{ __('Select A Photo') }}
                </x-jet-secondary-button>

                <x-jet-input-error for="thumbnail_photo" class="mt-2"/>
            </div>

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
            {{ __('Save') }}
        </button>
    </x-slot>

</x-modal>