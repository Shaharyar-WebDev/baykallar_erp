<!-- Dropdown -->
<div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
    <button id="hs-dropdown-account" type="button"
        class="size-9.5 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none dark:text-white"
        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        <img class="shrink-0 size-9.5 rounded-full"
            src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
            alt="Avatar">
    </button>

    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
        role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
        <div class="py-3 px-5 bg-gray-100 rounded-t-lg dark:bg-neutral-700">
            <p class="text-sm text-gray-500 dark:text-neutral-500">Signed in as</p>
            <p class="text-sm font-medium text-gray-800 dark:text-neutral-200">{{auth()->user()->email ?? 'guest'}}</p>
        </div>
        <div class="p-1.5 space-y-0.5">
            <x-dashboard.profile-dropdown-links />
        </div>
    </div>
</div>
<!-- End Dropdown -->