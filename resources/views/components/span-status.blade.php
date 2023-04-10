@props(
    ['status']
);

@if($status)
    <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
        <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
        Enabled
    </span>
    @else
    <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
        <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
        Desable
    </span>
@endif