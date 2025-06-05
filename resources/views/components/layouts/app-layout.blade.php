<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <x-partials.head></x-partials.head>
   <body class="bg-neutral-100 dark:bg-neutral-900">
        @yield('main')
    </body>
     <x-partials.scripts></x-partials.scripts>
</html>
