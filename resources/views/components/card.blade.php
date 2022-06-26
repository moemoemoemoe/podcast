<div class="">
    <div class="w-full">
        <div class="bg-white px-4 py-5 sm:px-6 w-full flex justify-between items-center">
            <div>
                <h3 class="text-lg leading-6 font-bold text-gray-900">
                    {{$title ?? ''}}
                </h3>
                <p class="mt-0 max-w-2xl text-sm text-gray-500">
                    {{$subtitle ?? ''}}
                </p>
            </div>
            <div class="flex flex-row space-x-3">
                {{$perPageContainer ?? ''}}
                {{ $actions ?? '' }}
            </div>
        </div>
        <div class="border-t border-gray-200">
            {{$body}}
        </div>
    </div>
</div>
