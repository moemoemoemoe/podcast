@if ($errors->any())
    <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
        <p class="font-bold">
            {{__('Oops! There are some errors.')}}
        </p>
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li><i class="far fa-times-circle"></i> {{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
    </div>
@endif
