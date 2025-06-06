<div class="hs-dropdown">

    <x-dashboard.components.tooltip tooltip="Language" placement="bottom">
         <button id="hs-settings-dropdown" type="button"
        class="hs-dropdown-toggle hs-tooltip-toggle p-2 font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-languages-icon lucide-languages"><path d="m5 8 6 6"/><path d="m4 14 6-6 2-3"/><path d="M2 5h12"/><path d="M7 2h1"/><path d="m22 22-5-10-5 10"/><path d="M14 18h6"/></svg>
    </button>
    </x-dashboard.components.tooltip>

    <div class="hs-dropdown-menu w-56 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 z-10 mt-2 min-w-[15rem] bg-white dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 shadow-lg rounded-lg p-2 border border-slate-200 block"
        role="menu"
        style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(362px, 94px, 0px);"
        data-placement="bottom-start">

        <div class="p-1 space-y-0.5">
            <a href="{{route('locale', ['locale'=>'tr'])}}" class="{{ app()->getLocale() == 'tr' ? 'bg-gray-100 dark:bg-neutral-700' : '' }} flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                >
                <img src="{{asset('storage/svg/flag-tr-svgrepo-com.svg')}}" class="size-5" alt="turkish-language"> Turkish
            </a>
            <a href="{{route('locale', ['locale'=>'en'])}}" class="{{ app()->getLocale() == 'en' ? 'bg-gray-100 dark:bg-neutral-700' : '' }} flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                >
                <img src="{{asset('storage/svg/flag-us-svgrepo-com.svg')}}" class="size-5" alt="turkish-language"> English
            </a>
            <a href="{{route('locale', ['locale'=>'ur'])}}" class="{{ app()->getLocale() == 'ur' ? 'bg-gray-100 dark:bg-neutral-700' : '' }} flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                >
                <img src="{{asset('storage/svg/flag-pk-svgrepo-com.svg')}}" class="size-5" alt="turkish-language"> Urdu
            </a>
        </div>
    </div>
</div>

