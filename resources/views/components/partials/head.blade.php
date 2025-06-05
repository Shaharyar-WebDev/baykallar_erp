<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title', 'Home')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        button,
        a {
            cursor: pointer;
        }
             .alert-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
        }
        .alert {
            transition: all 0.3s ease;
        }
        .alert:hover {
            transform: translateY(-2px);
        }
        .alert-icon-success{
            color: #10b981;
        }
        .alert-icon-error{
            color: #ef4444;
        }
        .alert-icon-info{
            color: #3b82f6;
        }
        .alert-icon-warning{
            color: #f59e0b;
        }
        .alert-success {
            background-color: #f0fdf4;
            border-left: 4px solid #10b981;
        }
        .dark .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
        }
        .alert-error {
            background-color: #fef2f2;
            border-left: 4px solid #ef4444;
        }
        .dark .alert-error {
            background-color: rgba(239, 68, 68, 0.1);
        }
        .alert-info {
            background-color: #eff6ff;
            border-left: 4px solid #3b82f6;
        }
        .dark .alert-info {
            background-color: rgba(59, 130, 246, 0.1);
        }
        .alert-warning {
            background-color: #fffbeb;
            border-left: 4px solid #f59e0b;
        }
        .dark .alert-warning {
            background-color: rgba(245, 158, 11, 0.1);
        }
        .alert-icon {
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
        }
        .alert-title {
            font-weight: 600;
            font-size: 1.125rem;
            color: #1e293b;
        }
        .dark .alert-title {
            color: #f1f5f9;
        }
        .alert-desc {
            color: #475569;
            font-size: 0.875rem;
        }
        .dark .alert-desc {
            color: #cbd5e1;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/NProgress.css')}}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles

    <script>
        document.addEventListener('livewire:navigated', () => {
            // This code is for theme and used to prevent page load glitches.
            const html = document.querySelector('html');
            const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
            const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

            if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
            else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
            else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
            else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
        });
    </script>
</head>