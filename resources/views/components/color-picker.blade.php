
<div
    x-data="{ color: '#00ffcc' }"
    x-init="
        picker = new Picker($refs.button);
        picker.onDone = rawColor => {
            color = rawColor.hex;
            $dispatch('input', color)
        }"
    wire:ignore
    {{ $attributes }}
>
    <div class="flex flex-row justify-between items-center">
        <span x-text="color" {{$attributes->merge(['class' => 'badge h-full rounded py-3 px-3'])}} :style="`background: ${color}` "></span>
        <button x-ref="button"  style="background: #13bfa6 ;color: #fff ; margin: 0" {{$attributes->merge(['class' => 'py-3 px-3 rounded-full'])}} >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
            </svg>
        </button>
    </div>
</div>
