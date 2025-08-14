<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AutoResQ') }}</title>
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        
        <!-- Login CSS - Use asset() helper for proper path -->
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        
        <!-- Vite Assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <!-- Remove the default wrapper that's interfering with your custom design -->
        {{ $slot }}
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Login JS - Use asset() helper for proper path -->
        <script src="{{ asset('js/login.js') }}"></script>
    </body>
</html>