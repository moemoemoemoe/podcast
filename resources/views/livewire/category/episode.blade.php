<x-modal form-action="save">
    <x-slot name="title">
        {{__('Podcasts')}}
    </x-slot>

    <x-slot name="subtitle">
        {{__('list podcast By category')}}
    </x-slot>

    <x-slot name="content">
        <dl>

            <div class="bg-gray-50 px-4 py-3 sm:grid items-center">

                <div class="grid grid-cols-4 gap-4">
                    @foreach($episodes as $episode)
                    <div >

                            <div x-data="playaudio()" class="h-20 w-20">
                                <button @keydown.tab="playAndStop" @click="playAndStop" type="button" class="relative rounded-xl group cursor-pointer focus:outline-none focus:ring focus:ring-[#1F89AE]">
                                    <div class="absolute inset-0 flex items-center justify-center p-8">
                                        <div class="w-full h-full transition duration-300 ease-in-out bg-cyan-500 filter group-hover:blur-2xl"></div>
                                    </div>
                                    <img alt="card audio player" class="relative rounded-xl" src="{{$episode->category->thumbnail}}" />
                                    <div class="absolute inset-0 flex items-center justify-center transition duration-200 ease-in-out bg-black rounded-xl bg-opacity-30 group-hover:bg-opacity-20">
                                        <div x-show="!currentlyPlaying" class="bg-white bg-opacity-50 rounded-full p-0.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div x-show="currentlyPlaying" class="bg-black bg-opacity-50 rounded-full p-0.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white text-opacity-0 transition duration-150 ease-in-out hover:text-opacity-20" viewBox="0 0 20 20" fill="white">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 00-1 1v4a1 1 0 001 1h4a1 1 0 001-1V8a1 1 0 00-1-1H8z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </button>

                                <audio x-ref="audio">
                                    <source src="{{$episode->pod_url}}" type="audio/mp3" />
                                </audio>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </dl>
    </x-slot>

    <x-slot name="buttons">


    </x-slot>

</x-modal>