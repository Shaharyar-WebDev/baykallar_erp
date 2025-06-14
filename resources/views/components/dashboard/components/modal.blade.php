@props([
    'modalId' => 'hs-modal',
    'modalTitle' => 'Modal',
    'action' => '',
    'method' => 'POST',
    'csrf' => true,
    'submitButtonText' => __('actions.save'),
    'submitBtnBg' => 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-700'
])

<div id="{{$modalId}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
    <form id="{{$modalId}}-form" action="{{$action}}" method="{{$method == 'PUT' || 'PATCH' || 'DELETE' ? 'POST' : $method }}" class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
        @if($csrf)
        @csrf
        @endif
        @if($method == 'PUT' || $method == 'PATCH' || $method == 'DELETE')
        @method($method)
        @endif
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
        <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
          {{$modalTitle}}
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="{{__('actions.close')}}" data-hs-overlay="#{{$modalId}}">
          <span class="sr-only">{{__('actions.close')}}</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto">
        {{$slot}}
      </div>
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#{{$modalId}}">
          {{__('actions.close')}}
        </button>
        <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent  text-white  focus:outline-hidden {{$submitBtnBg}} disabled:opacity-50 disabled:pointer-events-none">
        {{$submitButtonText}}
        </button>
      </div>
    </form>
  </div>
</div>
