@props([
'breadcrumbs',
])


<!-- Breadcrumb -->
<ol class="ms-3 flex items-center whitespace-nowrap">
    @php
        $count = count($breadcrumbs);
    @endphp
    @foreach ($breadcrumbs as $name => $route)
        @php
            $count--;
        @endphp
        <li class="{{$count == 0 ? 'font-semibold' : ''}} flex items-center text-sm text-gray-800 dark:text-neutral-400"
            {{$count == 0 ? 'aria-current="page"' : '' }}>
            <a href="{{$route}}">
                {{$name}}
            </a>

            @if ($count > 0)
                <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500" width="16" height="16"
                    viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" />
                </svg>
            @endif
        </li>
    @endforeach
</ol>
<!-- End Breadcrumb -->