<x-slot name="header">
    <div class="flex items-center justify-between">
        @if($breadcrumb && is_array($breadcrumb))
            <h2 class="font-semibold text-gray-800 leading-tight flex items-center gap-2">
                @foreach($breadcrumb as $key => $item)
                    @if(isset($item['link']))
                        <a href="{{$item['link']}}" class="text-gray-500">
                            {{__($item['label'])}} /
                        </a>
                    @else
                        <div class="">{{__($item['label'])}}</div>
                    @endif
                @endforeach
            </h2>
        @endif
        @if($link)
            <a href="{{$link['route']}}">
                {{__($link['label'])}}
            </a>
        @endif
    </div>
</x-slot>
