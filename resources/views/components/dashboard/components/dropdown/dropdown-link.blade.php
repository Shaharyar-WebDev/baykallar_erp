@props([
    'title' => 'Dropdown Link',
    'href' => '#',
    'icon' => null,
    'class' => 'flex items-center w-full justify-between gap-x-2 p-2 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700'
])
<a class="{{$class}}" href="{{$href}}">
    {!!$icon ?? ''!!}
    {{$title}}
</a>