<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
   <x-partials.head></x-partials.head>
   <body class="bg-neutral-100 dark:bg-neutral-900">
     
        {{ $slot }}
    </body>
    <x-partials.scripts></x-partials.scripts>
    @stack('scripts')
</html>
