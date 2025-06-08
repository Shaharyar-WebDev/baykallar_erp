@props([
    'id' => 'example',
    'chevron' => 'false',
    'class' => 'inline-flex items-center p-2 gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700'
])

<div class="hs-dropdown [--strategy:absolute] [--flip:false] hs-dropdown-{{$id}} relative inline-flex">
  <button id="hs-dropdown-{{$id}}" type="button" class="hs-dropdown-toggle {{$class}}" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
    {!!$button ?? 'Dropdown'!!}
    {!!$chevron === 'true' ? '<svg class="hs-dropdown-open:rotate-180 size-4 text-gray-600 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="m6 9 6 6 6-6"></path>
    </svg>' : '' !!}
  </button>

  <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 mt-2 bg-white shadow-md rounded-lg p-1 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-{{$id}}">
   
    @isset($links)
    {!! $links !!}
    @else
    <x-dashboard.components.dropdown.dropdown-link />
    @endisset
   
  </div>
</div>  


