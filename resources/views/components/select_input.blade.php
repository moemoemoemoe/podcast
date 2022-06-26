@props(['label' => false,'options' => null, 'key' => 'id','value' => 'name', 'hasNullOption' => true, 'first_option' => '-- Please Select --'])
@if(!is_array($options))
    @php $options = $options->toArray(); @endphp
@endif
@if($label)
    <div class="">
        <select
            id="selectBox" {{$attributes->merge(['class' => 'border-gray-300 focus:border-cofe-500 focus:ring-0 rounded-md shadow-sm transition'])}}>
            @if($hasNullOption)
                <option value="">-- {{__('Please choose')}} --</option>
            @endif
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
    <select
        id="selectBox" {{$attributes->merge(['class' => 'border-gray-300 focus:border-cofe-500 focus:ring-0 rounded-md shadow-sm transition'])}}>
        @if($hasNullOption)
            <option value="">{{__('-- Please Select --')}}</option>
        @endif
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
    <!-- @error($attributes['wire:model'])
        <div class="text-xs text-red-500">{{$message}}</div>
    @enderror -->
@endif
