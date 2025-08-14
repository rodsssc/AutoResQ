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
    
    <!-- Custom Sidebar CSS -->
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    
    <!-- Additional Custom Styles -->
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f8fafc;
        }
    </style>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="d-flex">
        <!-- Include Sidebar Navigation -->
        @include('layouts.navigation')
        
        <!-- Main Content Area -->
        <div class="main-content">
            <!-- Page Header -->
            @isset($header)
                <div class="page-header">
                    {{ $header }}
                </div>
            @endisset
            
            <!-- Page Content -->
            <main class="page-content">
                {{ $slot }}
            </main>
        </div>
    </div>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Additional JavaScript -->
    @stack('scripts')
</body>
</html>