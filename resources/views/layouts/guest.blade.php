<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CineTix') }} — Demo Bioskop</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans antialiased bg-cinema-900 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md" data-aos="fade-up">
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-3xl font-bold text-white">
                <i class="bi bi-camera-reels text-cinema-accent"></i>
                <span class="font-display">Cine<span class="text-cinema-accent">Tix</span></span>
            </a>
            <p class="text-gray-500 text-sm mt-2">Demo Bioskop — Platform Simulasi</p>
        </div>
        <div class="bg-cinema-800 border border-cinema-600/30 rounded-2xl shadow-2xl p-8">
            {{ $slot }}
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ duration: 800 });</script>
    @stack('scripts')
</body>
</html>
