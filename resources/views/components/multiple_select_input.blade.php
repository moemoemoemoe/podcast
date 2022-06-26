@props(['label' => false,'options' => null, 'key' => 'id','value' => 'name', 'hasNullOption' => true, 'first_option' => '-- Please Select --'])
@if(!is_array($options))
    @php $options = $options; @endphp
@endif
@if($label)
    <div class="">
        <select multiple {{$attributes->merge(['class' => 'w-full border border-gray-200 focus:outline-none focus:ring-0 focus:border-gray-400'])}}>
           
            @foreach($options as $option)
                <option value="{{$option[$key] }}">
                    @if(is_array($option[$value]))
                        {{$option[$value][app()->getLocale()] ?? ''}}
                    @else
                        {{$option[$value]}}
                    @endif
                </option>
            @endforeach
        </select>
        @error($attributes['wire:model'])
        <div class="text-xs text-red-500">{{$message}}</div>
        @enderror
    </div>
@else
    <select multiple {{$attributes->merge(['class' => 'border border-gray-200 focus:outline-none focus:ring-0 focus:border-gray-400'])}}>
      
        @foreach($options as $option)
            <option value="{{$option[$key] }}">{{$option[$value] }}</option>
        @endforeach
    </select>
    @error($attributes['wire:model'])
    <div class="text-xs text-red-500">{{$message}}</div>
    @enderror
@endif
