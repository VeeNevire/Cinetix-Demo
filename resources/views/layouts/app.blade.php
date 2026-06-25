<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CineTix') — Demo Bioskop</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased">
    {{-- Navbar --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-cinema-950/90 backdrop-blur-md border-b border-cinema-600/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-8">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold text-white hover:text-cinema-accent-light transition">
                        <i class="bi bi-camera-reels text-cinema-accent text-2xl"></i>
                        <span class="font-display">Cine<span class="text-cinema-accent">Tix</span></span>
                        <span class="text-[10px] bg-cinema-accent/20 text-cinema-accent-light px-2 py-0.5 rounded-full">DEMO</span>
                    </a>
                    <div class="hidden md:flex items-center gap-1">
                        <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white hover:bg-cinema-700 transition {{ request()->routeIs('home') ? 'text-cinema-accent-light bg-cinema-700' : '' }}">
                            <i class="bi bi-film me-1.5"></i>Now Playing
                        </a>
                        <div class="relative group">
                            <button class="px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white hover:bg-cinema-700 transition">
                                <i class="bi bi-grid-3x3-gap me-1.5"></i>Explore
                                <i class="bi bi-chevron-down text-xs ms-1"></i>
                            </button>
                            <div class="absolute top-full left-0 mt-1 w-48 bg-cinema-800 border border-cinema-600 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <a href="{{ route('genre.index', ['genre' => 'Action']) }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:text-white hover:bg-cinema-700 rounded-t-xl"><i class="bi bi-tags me-2"></i>Genre</a>
                                <a href="{{ route('usia.index', ['usia' => 'SU']) }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:text-white hover:bg-cinema-700 rounded-b-xl"><i class="bi bi-people me-2"></i>Usia</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('riwayat') }}" class="hidden sm:inline-flex items-center gap-1.5 text-sm text-gray-300 hover:text-white transition">
                            <i class="bi bi-clock-history"></i> Riwayat
                        </a>
                        <div class="flex items-center gap-2 bg-cinema-700 rounded-full px-4 py-1.5">
                            <i class="bi bi-person-circle text-cinema-accent"></i>
                            <span class="text-sm text-gray-200">{{ auth()->user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-sm text-gray-400 hover:text-red-400 transition" title="Logout">
                                    <i class="bi bi-box-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white transition">Login</a>
                        <a href="{{ route('register') }}" class="btn-primary text-sm py-1.5 px-4">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="demo-banner relative z-40 mt-16">
        <i class="bi bi-info-circle me-1"></i> DEMO MODE — Simulasi pembayaran dan tiket untuk demonstrasi. Tidak ada transaksi nyata.
    </div>

    <main class="pt-0">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-cinema-950 border-t border-cinema-600/30 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div data-aos="fade-up">
                    <div class="flex items-center gap-2 text-xl font-bold text-white mb-3">
                        <i class="bi bi-camera-reels text-cinema-accent"></i>
                        <span class="font-display">Cine<span class="text-cinema-accent">Tix</span></span>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed">Platform demo pemesanan tiket bioskop online. Pilih film, pesan kursi, dan dapatkan e-ticket instan.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="font-semibold text-white mb-3">Navigasi</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-cinema-accent-light transition"><i class="bi bi-chevron-right text-xs me-1"></i>Now Playing</a></li>
                        <li><a href="{{ route('genre.index', ['genre' => 'Action']) }}" class="hover:text-cinema-accent-light transition"><i class="bi bi-chevron-right text-xs me-1"></i>Genre</a></li>
                        <li><a href="{{ route('usia.index', ['usia' => 'SU']) }}" class="hover:text-cinema-accent-light transition"><i class="bi bi-chevron-right text-xs me-1"></i>Usia</a></li>
                        @auth
                        <li><a href="{{ route('riwayat') }}" class="hover:text-cinema-accent-light transition"><i class="bi bi-chevron-right text-xs me-1"></i>Riwayat</a></li>
                        @endauth
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="font-semibold text-white mb-3">Demo Info</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><i class="bi bi-envelope me-2"></i><a href="mailto:bayufahri89@gmail.com" class="hover:text-cinema-accent-light transition">bayufahri89@gmail.com</a></li>
                        <li><i class="bi bi-shield-check me-2"></i>Data dummy — tidak ada transaksi riil</li>
                        <li><i class="bi bi-github me-2"></i><a href="https://github.com/VeeNevire" target="_blank" class="hover:text-cinema-accent-light transition">VeeNevire</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-cinema-600/30 mt-8 pt-8 text-center text-xs text-gray-500">
                &copy; {{ date('Y') }} CineTix Demo. Dibuat dengan <i class="bi bi-heart-fill text-red-500"></i> untuk demonstrasi.
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        AOS.init({ duration: 800, once: true, offset: 50 });
    </script>
    @stack('scripts')
</body>
</html>
