<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style type="text/css">
           .scroll-hide::-webkit-scrollbar {
               display: none; /* webkit browsers implementation */
           }
        </style>
        

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <livewire:styles />
    </head>
    <body class="font-sans antialiased scroll-hide">
        <div class="min-h-screen bg-purple-50">
            
        @livewire('navigationbar')
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>            
        </div>
        

        @stack('modals')
        <livewire:scripts />
    </body>
</html>
