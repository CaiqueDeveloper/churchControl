 @props(['color'])
 <div
 class="shadow-sm shadow-gray-300 bg-white dark:bg-gray-800 w-full rounded-lg p-5 border dark:border-gray-700 flex">
        <div class="p-2 max-w-sm">
            <div class="bg-{{$color}}-300 rounded-full w-14 h-14 text-lg p-3 text-{{$color}}-600 mx-auto">
                <span class="">
                    {{$icon}}
                </span>
            </div>
        </div>
        <div class="block p-2 w-full">
            <p class="font-semibold text-gray-900 dark:text-gray-200 text-xl">{{$value}}</p>
            <h2 class="font-bold text-{{$color}}-600 text-md mt-1">{{$title}}</h2>
        </div>
    </div>