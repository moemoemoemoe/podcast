@props(['label' => false, 'type' => null])

<x-jet-label for="{{$attributes['wire:model']}}" value="{{ __($label) }}" />
<x-jet-input id="{{$attributes['wire:model']}}" type="{{$type}}" class="mt-1 block w-full" wire:model.defer="{{$attributes['wire:model']}}" />
<x-jet-input-error for="{{$attributes['wire:model']}}" class="mt-2" />
