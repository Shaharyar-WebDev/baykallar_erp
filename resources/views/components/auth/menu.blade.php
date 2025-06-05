<div class="hs-dropdown absolute top-0 right-0 mt-4 mr-4 ">
    <button id="hs-settings-dropdown" type="button"
        class="hs-dropdown-toggle p-2 text-slate-500 hover:text-slate-700 rounded-lg hover:bg-slate-100 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
            </path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
        </svg>
    </button>

    <div class="hs-dropdown-menu w-56 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 z-10 mt-2 min-w-[15rem] bg-white dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 shadow-lg rounded-lg p-2 border border-slate-200 block"
        role="menu"
        style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(362px, 94px, 0px);"
        data-placement="bottom-start">

        <x-partials.theme-menu>Theme</x-partials.theme-menu>

        <div class="p-1 space-y-0.5">
            <span class="flex w-full justify-between items-center pt-2 pb-1 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-500">
                Language
            </span>
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

        @auth
          <div class="p-1 space-y-0.5">
            <span class="flex w-full justify-between items-center pt-2 pb-1 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-500">
                Account
            </span>
            <a href="{{route('logout')}}" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-800 hover:bg-red-100 focus:outline-hidden focus:bg-red-100 dark:text-red-400 dark:hover:bg-red-700 dark:hover:text-red-300 dark:focus:bg-red-700"
                >
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out"><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/></svg>
                Logout
        </a>
        </div>
        @endauth
    </div>
</div>