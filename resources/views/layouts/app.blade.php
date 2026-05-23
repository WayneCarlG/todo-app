<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Todo App') }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script>
        // Enable dark mode support
        tailwind.config = {
            darkMode: 'class',
            content: ["./resources/**/*.blade.php"],
        }
    </script>
    
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-950 text-gray-900 dark:text-gray-100">
    <div class="min-h-screen">
        @include('layouts.navigation')
        
        <main>
            @yield('content')
        </main>
    </div>
    <!-- Theme Toggle Script -->
     <script>
        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
            const isDark = document.documentElement.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        }
        //Load saved theme
        if (localStorage.getItem('theme') === 'dark' || 
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>

</body>
</html>