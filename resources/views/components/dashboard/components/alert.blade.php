@if(session('response'))
    @php

        $status = session('response')['status'];
        $message = session('response')['message'];

        $icons = [
            'success' => '<svg xmlns="http://www.w3.org/2000/svg" class="size-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-icon lucide-circle-check"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>',
            'info' => '<svg xmlns="http://www.w3.org/2000/svg" class="size-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>',
            'warning' => '<svg xmlns="http://www.w3.org/2000/svg" class="size-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert-icon lucide-triangle-alert"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>',
            'error' => '<svg xmlns="http://www.w3.org/2000/svg" class="size-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x-icon lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>'
        ]
    @endphp
    <div class="alert alert-{{$status}} p-4 rounded-lg" style="
            min-width: 340px;
            position: fixed;
            right: 10px;
            z-index: 99;
            bottom: 10px;
            ">
        <div class="flex justify-center items-center">
            <div class="alert-icon-{{$status}} mr-4">
                {!!$icons[$status]!!}
            </div>
            <div>
                <h3 class="alert-title mb-1">
                    {{ucfirst($status)}}
                </h3>
                <p class="alert-desc">{{$message}}</p>
            </div>
            <button onclick="this.parentElement.parentElement.remove();"
                class="ml-auto text-slate-400 hover:text-slate-600 dark:text-slate-500 dark:hover:text-slate-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-x-icon lucide-x">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
    </div>
    <script>
        setTimeout(() => {
            let alert = document.querySelector('.alert');
            alert.remove();
        }, 3000);
    </script>
@endif