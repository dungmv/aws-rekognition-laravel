<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-100">
        <div class="w-4/5 mx-auto">
            <div class="px-2 py-4 bg-gray-300 mb-2 rounded">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Laravel + AWS Rekognition SDK Integration</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">This project demonstrates the integration of the AWS Rekognition SDK into a Laravel project.</p>
            </div>
            @yield('content')
        </div>
    </body>
</html>
