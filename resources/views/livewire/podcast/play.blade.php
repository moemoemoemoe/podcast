<div style="width: 50px; height:50px">

    <div x-data="playaudio()" class="h-80 w-80">
        <button @keydown.tab="playAndStop" @click="playAndStop" type="button" class="relative rounded-xl group cursor-pointer focus:outline-none focus:ring focus:ring-[#1F89AE]">
            <div class="absolute inset-0 flex items-center justify-center p-8">
                <div class="w-full h-full transition duration-300 ease-in-out bg-cyan-500 filter group-hover:blur-2xl"></div>
            </div>
            <div class="absolute inset-0 flex items-center justify-center transition duration-200 ease-in-out bg-black rounded-xl bg-opacity-30 group-hover:bg-opacity-20">
                <div x-show="!currentlyPlaying" class="bg-black bg-opacity-50 rounded-full p-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
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
            <source src="{{$row->pod_url}}" type="audio/mp3" />
        </audio>
    </div>
</div>
@push('scripts')
<script>
    function playaudio() {
        return {
            currentlyPlaying: false,
            //play and stop the audio
            playAndStop() {
                if (this.currentlyPlaying) {
                    this.$refs.audio.pause();
                    this.$refs.audio.currentTime = 0;
                    this.currentlyPlaying = false;
                } else {
                    this.$refs.audio.play();
                    this.currentlyPlaying = true;
                }
            }
        };
    }
</script>
@endpush