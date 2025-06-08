@props([
    'modalId' => 'hs-modal',
    'class' => 'py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none',
    'onclick' => null,
])

<button type="button" class="{{$class}}" aria-haspopup="dialog" aria-expanded="false" aria-controls="{{$modalId}}" data-hs-overlay="#{{$modalId}}"
@if ($onclick)
    onclick="{!! $onclick !!}"
@endif
>
     @if(trim($slot))
        {{ $slot }}
    @else
       Open Modal
    @endif
</button>