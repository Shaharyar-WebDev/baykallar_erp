<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-partials.auth.head></x-partials.auth.head>

<body class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-slate-50 to-slate-100 dark:from-neutral-900 dark:to-neutral-900">
    
    @yield('main')

<x-partials.auth.scripts></x-partials.auth.scripts>

</body>
</html>