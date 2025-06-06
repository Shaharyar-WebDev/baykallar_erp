@props([
    'tooltip' ?? 'tooltip',
    'placement' ?? 'bottom',
])

  <div class="hs-tooltip [--placement:{{$placement}}] inline-block">
      {{$slot}}
         <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs dark:bg-neutral-700" role="tooltip">
          {{$tooltip}}
        </span>
    </button>
    </div>